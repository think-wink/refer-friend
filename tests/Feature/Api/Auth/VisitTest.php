<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Internal\Visitor;

class VisitTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     */
    public function test_visit(): void
    {
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->postJson('/api/visit/create')
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('bounced', true)
            );
        $this->assertTrue(
            Visitor::find(1)->bounced
        );
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
            ->postJson('/api/visit/1/update')
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('bounced', false)
            );
        $this->assertFalse(
            Visitor::find(1)->bounced
        );
    }
}
