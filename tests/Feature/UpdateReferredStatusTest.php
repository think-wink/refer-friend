<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;

use Tests\TestCase;

class UpdateReferredStatusTest extends TestCase
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

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_unauthenticated(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', [], ['Accept' => 'application/json']);
    //     $response->assertStatus(401);
    // }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_empty(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', [], $this->headers);
    //     $response->assertStatus(422);
    // }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_missing_referrers(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['x'], $this->headers);
    //     $response->assertStatus(422);
    // }

    //  /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_wrong_type(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => 5], $this->headers);
    //     $response->assertStatus(422);
    // }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_empty(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => []], $this->headers);
    //     $response->assertStatus(422);
    // }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_unexpected_value(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => [
    //         '5'
    //     ]], $this->headers);
    //     $response->assertStatus(422);
    // }
     
    // /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_email_field_empty(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => [
    //         'email' => ''
    //     ]], $this->headers);
    //     $response->assertStatus(422);
    // }


    //  /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_email_invaild(): void
    // {
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => [
    //         'email' => 'asdfasdfasd'
    //     ]], $this->headers);
    //     $response->assertStatus(422);
    // }

    //  /**
    //  * A basic feature test example.
    //  */
    // public function test_referrers_referer_exists(): void
    // {
    //     Referrer::factory(['email' => 'test@mail.com'])->create();
    //     $response = $this->postJson('/api/referrer/create', ['referrers' => [
    //         'email' => 'test@mail.com'
    //     ]], $this->headers);
    //     $response->assertStatus(422);
    // }

    /**
     * A basic feature test example.
     */
    public function test_create_referrer(): void
    {   
        $this->assertNull(Referred::first());
        $referrer = Referrer::factory()->create();
        $this->postJson("/api/referrer/$referrer->uuid/referred/create", ['referred' => [
           [ 
            'email' => 'test@mail.com',
            'phone_number' => '123123123',
            'first_name' => 'xxxyyycccc',
            'last_name' => "asdfadsf",
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $item = Referred::first();
        $this->assertInstanceOf(Referred::class, $item);
        $this->assertEquals('test@mail.com', $item->email);
    }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_duplicate_create_referrer(): void
    // {   
    //     $this->postJson('/api/referrer/create', ['referrers' => [
    //        [ 'email' => 'test@mail.com'],
    //        [ 'email' => 'test@mail.com']
    //     ]], $this->headers)
    //         ->assertStatus(422);
    // }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_double_create_referrer(): void
    // {   
    //     $this->postJson('/api/referrer/create', ['referrers' => [
    //        [ 'email' => 'test@mail.com'],
    //        [ 'email' => 'te2st@mail.com']
    //     ]], $this->headers)
    //         ->assertStatus(201);
    //     $this->assertEquals(
    //         2,
    //         count(Referrer::all())
    //     );
    // }
}
