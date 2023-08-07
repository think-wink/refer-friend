<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Internal\AppUser;


class ResetTest extends TestCase
{
    use RefreshDatabase;

    protected $headers;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * test invalid requests
     */
    public function test_unprocessable(): void
    {
        $this->withHeaders($this->headers)
            ->postJson('/api/user/reset')
            ->assertStatus(422);
        
        $this->withHeaders($this->headers)
            ->postJson('/api/user/reset', [
                'email' => ''
            ])
            ->assertStatus(422);
        $this->withHeaders($this->headers)
            ->postJson('/api/user/reset', [
                'email' => 'name'
            ])
            ->assertStatus(422);
        
        $this->withHeaders($this->headers)
            ->postJson('/api/user/reset', [
                'email' => 'mail@mail.com'
            ])
            ->assertStatus(422);
    }


    /**
     * test invalid requests
     */
    public function test_login_no_app_user(): void
    {
        User::factory()->withWinkRole()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/reset', [
            'email'=>'test@example.com', 
        ]);
        $response->assertStatus(401);
    }

    /**
     * test invalid requests
     */
    public function test_reset(): void
    {
        AppUser::factory([
            'user_id' => User::factory([
                'email' => 'test@example.com',
                'name' => 'Test User',
            ])
        ])->create();
        
        $this->withHeaders($this->headers)
            ->postJson('/api/user/reset', [
                'email' => 'test@example.com'
            ])
            ->assertStatus(201);
    }
}
