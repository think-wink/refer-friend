<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class CreateReferredTest extends TestCase
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
        $response = $this->post('/api/referrer/create', [], ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     */
    public function test_empty(): void
    {
        $response = $this->post('/api/referrer/create', [], $this->headers);
        $response->assertStatus(422);
    }
}
