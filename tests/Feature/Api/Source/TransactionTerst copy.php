<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Internal\Retailer;
use App\Models\Internal\Transaction;

use Tests\TestCase;

// class TransactionTest extends TestCase
// {
//     use RefreshDatabase;

//     protected $headers;

//     public function setUp(): void
//     {
//         parent::setUp();
//         $token = User::factory()
//             ->create()
//             ->createToken('test')
//             ->plainTextToken;

//         $this->headers = [
//             'Accept' => 'application/json',
//             'Authorization' => 'Bearer '.$token,
//             'Content-Type' => 'application/json',
//         ];
//     }
   
//     /**
//      * A basic feature test example.
//      */
//     public function test_unauthenticated(): void
//     {
//         $response = $this->get('/api/transactions', ['Accept' => 'application/json']);
//         $response->assertStatus(401);

//         $response = $this->get('/api/transaction/1', ['Accept' => 'application/json']);
//         $response->assertStatus(401);
//     }

//     public function test_no_default(): void
//     {
//         Transaction::factory(['id' => 45])->create();
//         $response = $this->withHeaders($this->headers)->getJson("/api/transaction/45");
//         $response->assertStatus(200)
//         ->assertJson(fn (AssertableJson $json) =>
//             $json->whereAllType([
//                 'data.id' => 'integer',
//                 'data.retailer_id' => 'integer',
//                 'data.total_value' => 'integer',
//                 'data.cashback_amount' => 'integer',
//                 'data.transaction_date' => 'string',
//                 'data.customer_type' => ['string', 'null'],
//                 'data.currency' => 'string',`
//                 'data.status' => 'string'
//             ])
//         );
//     } 


//     public function test_single_page()
//     {
//         Transaction::factory(100)->create();
//         $response = $this->withHeaders($this->headers)->getJson("/api/transactions");
//         $this->assertTrue(count($response['data']) === 100);
//     }

//     /**
//      * A basic feature test example.
//      */
//     public function test_enabled(): void
//     {  
//         $response = $this->withHeaders($this->headers)->getJson('/api/transactions');
//         $response->assertStatus(200);
//         $response = $this->withHeaders($this->headers)->getJson('/api/transaction/1');            
//         $response->assertStatus(404);
//     }

//     public function test_paginated()
//     {
//         Transaction::factory(200)->create();
//         $response = $this->withHeaders($this->headers)->getJson("/api/transactions");
//         $response->assertStatus(200)
//             ->assertJson( fn (AssertableJson $json)  => 
//                 $json->whereAllType([
//                     'data' => 'array',
//                     'links' => 'array',
//                     'meta' => 'array',
//                     'data.0.id' => 'integer',
//                     'data.0.total_value' => 'integer',
//                     'data.0.retailer_id' => 'integer',
//                     'data.0.cashback_amount' => 'integer',
//                     'data.0.transaction_date' => 'string',
//                     'data.0.customer_type' => 'string|null',
//                     'data.0.currency' => 'string',
//                     'data.0.status' => 'string'
//                 ])
//             );
//         $this->assertTrue(count($response['data']) === 200);
//     }

//     public function test_paginated_2()
//     {
//         Transaction::factory(300)->create();
//         $response = $this->withHeaders($this->headers)->getJson("/api/transactions?page=2");
//         $this->assertTrue(count($response['data']) === 100);
//     }

//     public function test_paginated_outrange()
//     {
//         $response = $this->withHeaders($this->headers)->getJson("/api/transactions?page=2");
//         $this->assertTrue(count($response['data']) === 0);
//     }
// }

