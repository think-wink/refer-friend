<?php

namespace Tests\Feature\Source;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

use App\Models\Internal\AppUser;
use App\Models\Internal\Retailer;
use Illuminate\Support\Facades\Log;


class TransactionUpdateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_credit(): void
    {
        $app_user = AppUser::factory(['balance' => 0])->create();
        $this->assertEquals(
            $app_user->balance, 0
        );
        $retailer = Retailer::factory(['status' => 'active'])
            ->withTransactions(1, ['status' => 'pending', 'cashback_amount' => 5], collect([$app_user]))
            ->create();
        $trans_1 = $retailer->transactions[0];
        $app_user->refresh();
        $this->assertEquals(
            $app_user->balance, 0
        );
        $trans_1->status = 'approved';
        $trans_1->save();
        $app_user->refresh();
        $this->assertEquals($app_user->balance, 5);
      
        $trans_1->status = 'failed';
        $trans_1->save();
        $app_user->refresh();

        $this->assertEquals($app_user->balance, 5);

        $trans_1->status = 'approved';
        $trans_1->save();
        $app_user->refresh();
        
        $this->assertEquals($app_user->balance, 5);
        
        $retailer = Retailer::factory(['status' => 'active'])
            ->withTransactions(1, ['status' => 'pending', 'cashback_amount' => 10], collect([$app_user]))
            ->create();
        $trans_2 = $retailer->transactions[0];
        $this->assertEquals($app_user->balance, 5);
        $trans_2->status = 'approved';
        $trans_2->save();
        $app_user->refresh();
        $this->assertEquals($app_user->balance, 15);
        $app_user = AppUser::factory(['balance' => 0])->create();
        $this->assertEquals(
            $app_user->balance, 0
        );
    }

    public function test_redeem_0()
    { 
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['balance' => 0])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson("/api/user/redeem")
            ->assertStatus(405);
    }

    public function test_redeem_1999()
    {      
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['balance' => 1999])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson("/api/user/redeem")
            ->assertStatus(405);
    }
    
    public function test_redeem_2000()
    {  
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['balance' => 2000])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson("/api/user/redeem")
            ->assertStatus(201);
    }
    
    public function test_redeem_20000()
    {
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.AppUser::factory(['balance' => 20000])
                ->create()
                ->user
                ->createToken('test')
                ->plainTextToken
        ])
            ->postJson("/api/user/redeem")
            ->assertStatus(201);
    }
        
}    

