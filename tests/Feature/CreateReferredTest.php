<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;

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
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
            'email' => 'test@mail.com'
        ]], ['Accept' => 'application/json'])
            ->assertStatus(422);
    }

    /**
     * A basic feature test example.
     */
    public function test_empty(): void
    {
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", [], $this->headers)
            ->assertStatus(422);
    }

    /**
     * A basic feature test example.
     */
    public function test_bad_path(): void
    {
        $this->postJson("/api/referrer/aadsfasdf/referred/create", ['referees' => [
            [ 
             'email' => 'test@mail.com',
             'phone_number' => '1231113123',
             'first_name' => 'xxxyyycccc',
             'last_name' => "asdfadsf",
             ],
         ]], $this->headers)
            ->assertStatus(404);
    }

    /**
     * A basic feature test example.
     */
    public function test_missing_referees(): void
    {
        $referrer = Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => ['x']], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_email_invalid(): void
    {
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
            [ 
            'email' => 'tasdfasdfad',
            'phone_number' => '1231223123',
            'first_name' => 'xxxyyycccc',
            'last_name' => "asdfadsf",
            ],
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_phone_number_invalid(): void
    {
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
            [ 
            'email' => 'test@mail.com',
            'phone_number' => 'asdfasdf',
            'first_name' => 'xxxyyycccc',
            'last_name' => "asdfadsf",
            ],
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_first_name_invalid(): void
    {
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
            [ 
            'email' => 'test@mail.com',
            'phone_number' => '1231223123',
            'first_name' => 'x',
            'last_name' => "asdfadsf",
            ],
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_last_name_invalid(): void
    {
        $referrer =Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
            [ 
            'email' => 'test@mail.com',
            'phone_number' => '1231223123',
            'first_name' => 'xasdfasdf',
            'last_name' => "",
            ],
        ]], $this->headers)
            ->assertStatus(422);
    }

    /**
     * A basic feature test example.
     */
    public function test_create_referred(): void
    {   
        $referrer = Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referees' => [
           [ 
            'email' => 'test@mail.com',
            'phone_number' => '1231113123',
            'first_name' => 'xxxyyycccc',
            'last_name' => "asdfadsf",
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $item = Referred::first();
        $this->assertInstanceOf(Referred::class, $item);
        $this->assertEquals('test@mail.com', $item->email);
    }
}
