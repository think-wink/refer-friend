<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;

use Tests\TestCase;

class UnsubscribeTest extends TestCase
{
    use RefreshDatabase;

    protected $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    public function test_unsubscribe_referrer(): void
    {
        $referrer = Referrer::factory()->create();
        $this->postJson(
            '/api/referrer/'.$referrer->uuid.'/unsubscribe',
            [],
            $this->headers
        )->assertStatus(201);
        $this->assertFalse($referrer->refresh()->subscribed);
    }

    public function test_unsubscribe_referred(): void
    {
        $referred = Referred::factory()->create();
        $this->postJson(
            '/api/referred/'.$referred->uuid.'/unsubscribe',
            [],
            $this->headers
        )->assertStatus(201);
        $this->assertFalse($referred->refresh()->subscribed);
    }

}
