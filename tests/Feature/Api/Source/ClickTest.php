<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Internal\Promo;
use App\Models\Internal\AppUser;
use App\Models\Internal\Click;


use Tests\TestCase;

class CLickTest extends TestCase
{
    use RefreshDatabase;

    protected $headers;

    public function test_unauthenticated()
    {
        Promo::factory(['id' => 1])->create();
        $this->withHeader('Accept', 'application/json')
            ->postJson('/api/user/promo/1/click')
            ->assertStatus(401);
    }

    public function test_no_promo()
    {
        Promo::factory(['id' => 1])->create();
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['id' => 6, 'balance' => 2000])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson('/api/user/promo/2/click')
            ->assertStatus(404);
    }

    public function test_success()
    {
        Promo::factory(['id' => 1])->create();
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['id' => 6, 'balance' => 2000])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson("/api/user/promo/1/click")
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('app_user_id', 6)
                    ->where('promo_id', 1)
            );
        $click = Click::first();
        $this->assertNotNull($click);
        $this->assertInstanceOf(AppUser::class, $click->app_user);
        $this->assertInstanceOf(Promo::class, $click->promo);
    }

    
           
}
