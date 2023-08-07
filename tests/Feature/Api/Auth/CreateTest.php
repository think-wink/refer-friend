<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Internal\AppUser;
use App\Models\User;
use Carbon\Carbon;

class CreateTest extends TestCase
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
    
    public function test_missing_param(): void
    {
        AppUser::factory([
            'user_id'=>null,
            'activation_code' => 
            'fe692e76-ca93-3b5e-982a-87e5d3adbfbb']
        )->create();

        $response = $this->withHeaders($this->headers)->postJson('/api/user/create');
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create',[ 
            'email'=>''
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email'=>'', 
            'password' => ''
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email'=>'name', 
            'password' => ''
        ]);
        $response->assertStatus(422);
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email'=>'mail@mail.com', 
            'password' => '1234'
        ]);
        $response->assertStatus(422);
        $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'testb@example.com',
            'password' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb'
        ])->assertStatus(422);
    }
    
    public function test_insecure_password()
    {
        AppUser::factory([
            'user_id'=>null,
            'activation_code' => 
            'fe692e76-ca93-3b5e-982a-87e5d3adbfbb']
        )->create();
        foreach([
            'password1A@', 
            'asdfasdfe', 
            'asd1fasdfe', 
            'asdfasdfe@',
            'asdfasdfeA',
            'A@12312123'  
        ] as $password) {
            $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
                'email' => 'testb@example.com',
                'password' => $password,
                'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
                'password_confirmation' => $password
            ]);
            $response->assertStatus(422);
        }
    }
    
    public function test_no_match_passwords()
    {
        AppUser::factory([
            'user_id'=>null,
            'activation_code' => 
            'fe692e76-ca93-3b5e-982a-87e5d3adbfbb']
        )->create();
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'testb@example.com',
            'password' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
            'password_confirmation' => 'asdfasdfeA'
        ]);
        $response->assertStatus(422);
    }
    
    public function test_matching_email()
    {
        User::factory([
            'email' => 'test@example.com'
        ])->create();
        AppUser::factory([
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb'
        ])->create();

        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'test@example.com',
            'password' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
            'password_confirmation' => 'asdfasdfe@A1'
        ]);
        $response->assertStatus(422);
    }

    public function test_matching_email_soft_deleted()
    {
        User::factory([
            'email' => 'test@example.com',
            'deleted_at' => Carbon::now()
        ])->create();
        
        AppUser::factory([
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
        ])->create();

        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'test@example.com',
            'password' => 'asdfasdfe@A1',
            'password_confirmation' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
            'password_confirmation' => 'asdfasdfe@A1'
        ]);
        $response->assertStatus(422);
    }

    public function test_wrong_code()
    {
        AppUser::factory([
            'user_id'=>null,
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb'
        ])->create();
        
        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'testb@example.com',
            'password' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfb',
            'password_confirmation' => 'asdfasdfe@A1',
        ]);
        $response->assertStatus(422);
    }

    public function test_create(): void
    {
        AppUser::factory([
            'user_id'=>null, 
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb'
        ])->create();

        $response = $this->withHeaders($this->headers)->postJson('/api/user/create', [
            'email' => 'testb@example.com',
            'password' => 'asdfasdfe@A1',
            'activation_code' => 'fe692e76-ca93-3b5e-982a-87e5d3adbfbb',
            'password_confirmation' => 'asdfasdfe@A1',
        ]);
        $response->assertStatus(201);
        $this->assertNotNull(User::where('email', 'testb@example.com')->first());
    }
}
