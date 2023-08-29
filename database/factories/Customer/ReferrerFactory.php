<?php

namespace Database\Factories\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer\Referred;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer\Referer>
 */
class ReferrerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'subscribed' => $this->faker->boolean(),
            'uuid' => $this->faker->unique()->uuid()
        ];
    }

    public function withReferrals(): static
    {
        return $this
        ->has(
            Referred::factory($this->faker->numberBetween(0, 3))
        )->has(
            Referred::factory($this->faker->numberBetween(0, 3))->failed()
        )->has(
            Referred::factory($this->faker->numberBetween(0, 3))->notUpdated()
        )->has(
            Referred::factory($this->faker->numberBetween(0, 3))->manualMatch()
        );
    }
}
