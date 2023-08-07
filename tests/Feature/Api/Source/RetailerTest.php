<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Internal\Retailer;

use Tests\TestCase;

class RetailerTest extends TestCase
{
    use RefreshDatabase;

    protected $headers;

    public function setUp(): void
    {
        parent::setUp();
        $token = User::factory()
            ->create()
            ->createToken('test')
            ->plainTextToken;

        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
        ];
    }
   
    /**
     * A basic feature test example.
     */
    public function test_unauthenticated(): void
    {
        $response = $this->get('/api/retailers', ['Accept' => 'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/retailer/1', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

     /**
     * A basic feature test example.
     */
    public function test_no_retailers(): void
    {  
        $response = $this->withHeaders($this->headers)->getJson('/api/retailers');
        $response
            ->assertStatus(200)
            ->assertJson( fn (AssertableJson $json)  => 
                $json->whereAllType([
                    'data' => 'array',
                    'links' => 'array',
                    'meta' => 'array',
                ])
            );
        
        $response = $this->withHeaders($this->headers)->getJson('/api/retailer/1');            
        $response->assertStatus(404);
    }

    public function test_disabled(): void
    {
        $retailer = Retailer::factory(1, ['status' => 'ended', 'id'=>1])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/retailer/1");
        $response->assertStatus(401);
    }

    public function test_retailer_get(): void
    {
        $retailer = Retailer::factory(1, ['status' => 'active', 'id' => 1])->withDefaultCommission()->create();

        $response = $this->withHeaders($this->headers)->getJson("/api/retailer/1");
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.id' => 'integer',
                'data.company_name' => 'string',
                'data.target_url' => 'string|null',
                'data.tracking_url' => 'string|null',
                'data.image' => 'string|null',
                'data.max_commission_details' => 'array',
            ])
        );
    } 
        
    public function test_paginated_0()
    {
        Retailer::factory(100, ['status' => 'active'])->withDefaultCommission()->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/retailers");
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data' => 'array',
                'links' => 'array',
                'meta' => 'array',
                'data.0.id' => 'integer',
                'data.0.company_name' => 'string',
                'data.0.target_url' => 'string|null',
                'data.0.tracking_url' => 'string|null',
                'data.0.image' => 'string|null',
                'data.0.max_commission_details' => 'array',
            ])
        );
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated()
    {
        Retailer::factory(300, ['status' => 'active'])->withDefaultCommission()->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/retailers");
        $this->assertTrue(count($response['data']) === 200);
    }

    public function test_paginated_2()
    {
        Retailer::factory(300, ['status' => 'active'])->withDefaultCommission()->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/retailers?page=2");
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated_outrange()
    {
        $response = $this->withHeaders($this->headers)->getJson("/api/retailers?page=2");
        $this->assertTrue(count($response['data']) === 0);
    }
           
}
