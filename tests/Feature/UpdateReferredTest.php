<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;

use Tests\TestCase;

class UpdateReferredTest extends TestCase
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
        $this->postJson('/api/referred/1/update', [], ['Accept' => 'application/json'])
            ->assertStatus(401);
    }

    public function test_no_referred(): void
    {
        $this->postJson('/api/referred/1/update', [], $this->headers)
            ->assertStatus(404);
    }

    public function test_no_empty(): void
    {
        Referred::factory(['id' => 1])->create();
        $this->postJson('/api/referred/1/update', [], $this->headers)
            ->assertStatus(201);
    }

    public function test_invalid_reward_status(): void
    {
        Referred::factory(['id' => 1])->create();
        $this->postJson('/api/referred/1/update', [
            'reward_status' => 'new_status',
        ], $this->headers)
            ->assertStatus(422);
    }

    public function test_update_email(): void
    {
        Referred::factory(['id' => 1])->create();
        $this->postJson('/api/referred/1/update', [
            'email' => 'new@mail.com',
        ], $this->headers)
            ->assertStatus(201);
        $this->assertEquals('new@mail.com', Referred::find(1)->email);
    }

    public function test_update_duplicate_email(): void
    {
        Referred::factory(['id' => 1, 'email' => 'new@mail.com'])->create();
        $this->postJson('/api/referred/1/update', [
            'email' => 'new@mail.com',
        ], $this->headers)
            ->assertStatus(422);
    }

    public function test_update_phone(): void
    {
        Referred::factory(['id' => 1])->create();
        $this->postJson('/api/referred/1/update', [
            'phone_number' => 'aasdd',
        ], $this->headers)
            ->assertStatus(201);
        $this->assertEquals('aasdd', Referred::find(1)->phone_number);
    }

    public function test_update_phone_invalid(): void
    {
        Referred::factory(['id' => 1])->create();
        $this->postJson('/api/referred/1/update', [
            'phone_number' => 'aasdd912312akwdjf;ajk;df;ljkasdfkjlasdjk;lfasdjlkfakl;sdfasdj;fkasdj;klfjlaksdf;kljasdflkas;fkja;jfajsdfajksfklsadfjl;ksadfjkl;sdf;jlkasdfjlk;asjkf;asdj;klf',
        ], $this->headers)
            ->assertStatus(422);
    }

    public function testMergeNoStatus(): void
    {
        Referred::factory(['id' => 1, 'email' => 'old_email'])->create();
        Referred::factory(['id' => 2, 'email' => 'new_email'])->create();
        $this->postJson('/api/referred/1/merge', [
            'merge_email' => 'new_email',
        ], $this->headers)
            ->assertStatus(422);
    }

    public function testMergeUnknownEmail(): void
    {
        Referred::factory(['id' => 1, 'email' => 'old_email'])->create();
        $this->postJson('/api/referred/1/merge', [
            'merge_email' => 'new_email',
            'reward_status' => 'pension_boost_eligible'
        ], $this->headers)
            ->assertStatus(422);
    }

    public function testMerge(): void
    {
        Referred::factory(['id' => 1, 'email' => 'old_email'])->create();
        Referred::factory(['id' => 2, 'email' => 'new_email'])->create();
        $this->postJson('/api/referred/1/merge', [
            'merge_email' => 'new_email',
            'reward_status' => 'pension_boost_eligible'
        ], $this->headers)
            ->assertStatus(201);
        $this->assertEquals('old_email', Referred::find(1)->email);
        $this->assertEquals('pension_boost_eligible', Referred::find(1)->reward_status);
        $this->assertEquals(1, Referred::count());
    }
   
}
