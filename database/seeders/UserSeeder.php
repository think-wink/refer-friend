<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Role;
use App\Models\User;
use App\Models\Internal\AppUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'wink_admin',
            'client_admin',
        ])->each(function ($name) {
            $role = new Role(['type' => $name]);
            $role->save();
        });

        collect(range(0, 35))->each(
            fn () => AppUser::factory()->withRedemptions()->create()
        );
       
        AppUser::factory(10, ['user_id'=>null, 'balance' => 0])->create();
        User::factory(25)->withAdminRole()->create();
        User::factory(5)->withWinkRole()->create();
        
        User::factory()->withWinkRole()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }    
}
