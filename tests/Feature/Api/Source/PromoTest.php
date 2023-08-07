<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Internal\Retailer;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PromoTest extends TestCase
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
        $response = $this->get('/api/promos', ['Accept' => 'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/promo/1', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

     /**
     * A basic feature test example.
     */
    public function test_authenticated(): void
    {  
        $response = $this->withHeaders($this->headers)->getJson('/api/promos');
        $response->assertStatus(200);
        $response = $this->withHeaders($this->headers)->getJson('/api/promo/1');            
        $response->assertStatus(404);
    }

    public function test_disabled(): void
    {
        Retailer::factory()->hasPromos(['status' => 'ended', 'id'=> 45])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promo/45");
        $response->assertStatus(401);
    }

    public function test_single_success(): void
    {
        Retailer::factory(['id' => 22, 'status' => 'active'])->hasPromos(['id'=> 45, 'description' => '$ww', 'status' => 'active'])->create();
        $this->withHeaders($this->headers)->getJson("/api/promo/45")
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.id' => 'integer',
                'data.retailer_id' => 'integer',
                'data.type' => 'string',
                'data.coupon_code' =>  'string|null',
                'data.description' => 'null|string',
                'data.terms' => 'null|string',
                'data.start_date' => 'null|string',
                'data.end_date' => 'null|string',
                'data.target_url' => 'null|string',
                'data.tracking_url' => 'null|string',
            ])
    );
    } 

    public function test_disabled_promos(): void
    {
        Retailer::factory(['id' => 22, 'status' => 'active'])->hasPromos(['id'=> 45, 'description' => '$ww', 'status' => 'ended'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promo/45");
        $response->assertStatus(401);

        Retailer::factory(['id' => 23, 'status' => 'active'])->hasPromos(['id'=> 46, 'description' => 'ww', 'status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promo/46");
        $response->assertStatus(401);

        Retailer::factory(['id' => 24, 'status' => 'ended'])->hasPromos(['id'=> 47, 'description' => '$ww', 'status' => 'active'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promo/47");
        $response->assertStatus(401);
    }

    public function test_single_page()
    {
        Retailer::factory(10, ['status' => 'active'])
            ->hasPromos(10, ['status' => 'active', 'description' => '$'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promos");
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data' => 'array',
                'links' => 'array',
                'meta' => 'array',
                'data.0.id' => 'integer',
                'data.0.retailer_id' => 'integer',
                'data.0.type' => 'string',
                'data.0.coupon_code' => 'string|null',
                'data.0.description' => 'null|string',
                'data.0.terms' => 'null|string',
                'data.0.start_date' => 'null|string',
                'data.0.end_date' => 'null|string',
                'data.0.target_url' => 'null|string',
                'data.0.tracking_url' => 'null|string',
            ])
        );
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated()
    {
        Retailer::factory(20, ['status' => 'active'])
            ->hasPromos(10, ['status' => 'active', 'description' => '$'])
            ->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promos");
        $this->assertTrue(count($response['data']) === 200);
    }

    public function test_paginated_2()
    {
        Retailer::factory(30, ['status' => 'active'])->hasPromos(10, ['status' => 'active', 'description' => '$'])->create();
        $response = $this->withHeaders($this->headers)->getJson("/api/promos?page=2");
        $this->assertTrue(count($response['data']) === 100);
    }

    public function test_paginated_outrange()
    {
        $response = $this->withHeaders($this->headers)->getJson("/api/promos?page=2");
        $this->assertTrue(count($response['data']) === 0);
    }
}
