<?php

namespace Database\Seeders;

use App\Models\Customer\Referrer;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferrerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(range(0, 200))->each(
            fn() => Referrer::factory()
                ->withReferrals()
                ->create()
        );
    }
}
