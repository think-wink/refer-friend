<?php

namespace Database\Seeders;

use App\Models\Internal\Visitor;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AppDetailsSeeder::class,
            UserSeeder::class,
            MerchantSeeder::class,
            VisitorSeeder::class
        ]);
        
    }
}
