<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Internal\Retailer;
use App\Models\Internal\Transaction;

use Tests\TestCase;

class TransactionTest extends TestCase
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
       
    }

    
}

