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

    public function test_unauthenticated(): void
    {
        $this->postJson('/api/referred/upsert', [], ['Accept' => 'application/json'])
            ->assertStatus(401);
    }

    public function test_empty(): void
    {
        $this->postJson('/api/referred/upsert', [], $this->headers)
            ->assertStatus(422);
    }

    public function test_missing_referrers(): void
    {
        $this->postJson('/api/referred/upsert', ['x'], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_wrong_type(): void
    {
        $this->postJson('/api/referred/upsert', ['referees' => 5], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_empty(): void
    {
        $this->postJson('/api/referred/upsert', ['referees' => []], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_unexpected_value(): void
    {
        $this->postJson('/api/referred/upsert', ['referees' => [
            '5'
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_email_invalid(): void
    {
       $this->postJson('/api/referrer/create', ['referrers' => [
            'email' => 'asdfasdfasd',
            'match_phone_number' => '1234512345',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_first_name_invalid(): void
    {
       $this->postJson('/api/referrer/create', ['referrers' => [
            'email' => 'asdfasdfasd',
            'match_phone_number' => '1234512345',
            'match_first_name' => 'asdfasdjfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfsdfasdfasdfasdf',
            'match_last_name' => "asdfadsf",
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_last_name_invalid(): void
    {
       $this->postJson('/api/referrer/create', ['referrers' => [
            'email' => 'asdfasdfasd',
            'match_phone_number' => '1234512345',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "a",
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_referrers_phone_number_invalid(): void
    {
       $this->postJson('/api/referrer/create', ['referrers' => [
            'email' => 'asdfasdfasd',
            'match_phone_number' => '222',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
        ]], $this->headers)
            ->assertStatus(422);
    }

    public function test_email_match(): void
    {   
        Referred::factory(['email' => 'test@mail.com'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }  
    
    public function test_phone_match(): void
    {   
        Referred::factory(['phone_number' => '1231223123'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);

    }

    public function test_phone_with_strip_match(): void
    {   
        Referred::factory(['phone_number' => '1231223123'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1a231223as123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);

    }

    public function test_name_match(): void
    {   
        Referred::factory(['first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }

    public function test_duplicate_name_match(): void
    {   
        Referred::factory(2, ['first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 3);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('failed',  $referrer->match_status);
    }

    public function test_name_duplicate_phone_numbers(): void
    {
        Referred::factory(2, ['phone_number' => '1231223123'])->notUpdated()->create();   
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 3);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('failed',  $referrer->match_status);
    }

    public function test_name_duplicate_phone_name_diff(): void
    {
        Referred::factory(['phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        Referred::factory(['phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'test'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('first_name', 'xxxyyycccc')->where('last_name', 'asdfadsf')->first();
        $this->assertEquals(Referred::count(), 2);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }

    public function test_name_duplicate_names_phone_diff(): void
    {
        Referred::factory(['phone_number' => '1231223122', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        Referred::factory(['phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('phone_number', '1231223123')->first();
        $this->assertEquals(Referred::count(), 2);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }

    public function test_name_double_duplicate(): void
    {
        Referred::factory(['phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        Referred::factory(['phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 3);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('failed',  $referrer->match_status);
    }

    public function test_name_double_duplicate_unique_emails(): void
    {
        Referred::factory(['email' => 'test@mail.com', 'phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        Referred::factory(['email' => 'test2@mail.com', 'phone_number' => '1231223123', 'first_name' => 'xxxyyycccc', 'last_name' => 'asdfadsf'])->notUpdated()->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 2);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }

    public function test_status_manual_no_update(): void
    {
        Referred::factory(['email' => 'test@mail.com', 'match_status' => 'manual'])->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('manual',  $referrer->match_status);
    }

    public function test_status_failed_no_update(): void
    {
        Referred::factory(['email' => 'test@mail.com', 'match_status' => 'failed'])->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals(Referred::count(), 1);
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('failed',  $referrer->match_status);
    }

    public function test_double_create(): void
    {
        Referred::factory(['email' => 'test@mail.com'])->create();
        Referred::factory(['email' => 'test2@mail.com'])->create();

        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
            [ 
            'match_email' => 'test2@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $this->assertEquals(Referred::count(), 2);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
        $referrer =  Referred::where('email', 'test2@mail.com')->first();
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
    }

    public function test_double_create_one_match_fails(): void
    {
        Referred::factory(['email' => 'test@mail.com'])->create();

        $this->postJson("/api/referred/upsert", ['referees' => [
           [ 
            'match_email' => 'test@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
            [ 
            'match_email' => 'test2@mail.com',
            'match_phone_number' => '1231223123',
            'match_first_name' => 'xxxyyycccc',
            'match_last_name' => "asdfadsf",
            'new_status' => 'meeting_booked',
            ],
        ]], $this->headers)
            ->assertStatus(201);
        $this->assertEquals(Referred::count(), 2);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('auto',  $referrer->match_status);
        $referrer =  Referred::where('email', 'test2@mail.com')->first();
        $this->assertEquals('meeting_booked', $referrer->reward_status);
        $this->assertEquals('failed',  $referrer->match_status);
    }

    public function test_alias_email_found()
    {
        Referred::factory(['email' => 'test@mail.com'])->manualMatch(1, ['email' => 'test2@mail.com'])->create();
        $this->postJson("/api/referred/upsert", ['referees' => [
            [ 
             'match_email' => 'test2@mail.com',
             'match_phone_number' => '1231223123',
             'match_first_name' => 'xxxyyycccc',
             'match_last_name' => "asdfadsf",
             'new_status' => 'meeting_booked',
             ],
         ]], $this->headers)
             ->assertStatus(201);
        $referrer =  Referred::where('email', 'test@mail.com')->first();
        $this->assertEquals('meeting_booked', $referrer->reward_status);
    }
}
