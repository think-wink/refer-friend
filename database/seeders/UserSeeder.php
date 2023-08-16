<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        // User::factory(10)->create();
        // User::factory(5, ['admin' => true])->create();
        User::factory([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'admin' => true
        ])->create();
    }    
}
