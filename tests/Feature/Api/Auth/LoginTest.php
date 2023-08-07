<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Internal\AppUser;

class LoginTest extends TestCase
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
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login');
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'',
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'', 
            'password' => '',
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'name', 
            'password' => '',
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'mail@mail.com', 
            'password' => 'password',
        ]);
        $response->assertStatus(422);
    }

    /**
     * test invalid requests
     */
    public function test_wrong_password(): void
    {
        User::factory()->withWinkRole()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'test@example.com', 
            'password' => 'password',
        ]);
        $response->assertStatus(401);
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
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'test@example.com', 
            'password' => 'password',
        ]);
        $response->assertStatus(401);
    }

    /**
     * test invalid requests
     */
    public function test_login(): void
    {
        AppUser::factory([
            'user_id' => User::factory([
                'email' => 'test@example.com',
                'name' => 'Test User',
            ])
        ])->create();

        
        $response = $this->withHeaders($this->headers)->postJson('/api/user/login', [
            'email'=>'test@example.com', 
            'password' => 'password',
        ]);
        
        $response->assertStatus(201);
        $response->assertJson(['token' => true]);
        $this->headers['Authorization'] = 'Bearer '.$response->original['token'];
        
        $this->withHeaders($this->headers)
            ->get('/api/commissions')
            ->assertStatus(200);
    }
}
