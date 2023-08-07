<?php

namespace Tests\Feature\Api\Source;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Internal\Commission;
use App\Models\Internal\Retailer;

use Tests\TestCase;
class CommissionTest extends TestCase
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
        $response = $this->get('/api/commissions', ['Accept' => 'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/commission/1', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    public function test_disabled(): void
    {
        Commission::factory(['id' => 45, 'status' => 'pending'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commission/45");
        $response->assertStatus(401);
    }

    public function test_disabled_2(): void
    {
        Commission::factory(['id' => 45, 'status' => 'ended'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commission/45");
        $response->assertStatus(401);
    }

     /**
     * A basic feature test example.
     */
    public function test_authenticated(): void
    {  
        $response = $this->withHeaders($this->headers)->getJson('/api/commissions');
        $response->assertStatus(200);        
        $response = $this->withHeaders($this->headers)->getJson('/api/commission/1');            
        $response->assertStatus(404);
    }

    public function test_enabled(): void
    {
        Retailer::factory(1, ['status' => 'active'])->withCommissions(1, ['status' => 'active', 'id' => 45])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commission/45");
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.id' => 'integer',
                'data.retailer_id' => 'integer',
                'data.type' => 'string',
                'data.rate' => 'integer',
                'data.description' => 'null|string',
                'data.terms' => 'null|string',
                'data.start_date' => 'null|string',
                'data.end_date' => 'null|string',
                'data.default' => 'boolean',
            ])
        );
    } 


    public function test_single_page()
    {
        Retailer::factory(10, ['status' => 'active'])->withCommissions(10, ['status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commissions");
        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->whereAllType([
            'data' => 'array',
            'links' => 'array',
            'meta' => 'array',
            'data.0.id' => 'integer',
            'data.0.retailer_id' => 'integer',
            'data.0.type' => 'string',
            'data.0.rate' => 'integer',
            'data.0.description' => 'null|string',
            'data.0.terms' => 'null|string',
            'data.0.start_date' => 'null|string',
            'data.0.end_date' => 'null|string',
            'data.0.default' => 'boolean',
        ])
    );
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated()
    {
        Retailer::factory(20, ['status' => 'active'])->withCommissions(10, ['status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commissions");
        $this->assertTrue(count($response['data']) === 200);
    }

    public function test_paginated_2()
    {
        Retailer::factory(10, ['status' => 'active'])->withCommissions(30, ['status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commissions?page=2");
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated_outrange()
    {
        $response = $this->withHeaders($this->headers)->getJson("/api/commissions?page=2");
        $this->assertTrue(count($response['data']) === 0);
    }

    public function test_paginated_outrange_2()
    {
        Retailer::factory(10, ['status' => 'active'])->withCommissions(10, ['status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/commissions?page=2");
        $this->assertTrue(count($response['data']) !== 100);
    }
}
