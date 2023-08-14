<?php

namespace Database\Factories\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer\Referred;
use App\Models\Customer\Referrer;
use App\Models\Customer\ReferredAlias;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer\Referred>
 */
class ReferredFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reward_status = array_diff(
            array_merge(Referred::INTERNAL_STATUS, Referred::EXTERNAL_STATUS), [
                'eligibly_email_1_sent',
                'eligibly_email_2_sent',
                'eligibly_email_3_sent',
                'eligibly_email_4_sent'
        ]);

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'reward_status' => $this->faker->randomElement($reward_status),
            'match_status' => 'auto',
            'referrer_id' => Referrer::factory(),
        ];
    }

    public function failed() {
        return $this->state(function (array $attributes) {
            $reward_status = array_diff(
                array_merge(Referred::INTERNAL_STATUS, Referred::EXTERNAL_STATUS), [
                    'eligibly_email_1_sent',
                    'eligibly_email_2_sent',
                    'eligibly_email_3_sent',
                    'eligibly_email_4_sent',
                    'reward_credited'
            ]);
            return [
                'match_status' => 'failed',
                'reward_status' => $this->faker->randomElement($reward_status),
            ];
        });
    }

    public function notUpdated() {
        return $this->state(function (array $attributes) {
            return [
                'match_status' => 'not_updated',
                'reward_status' =>  $this->faker->randomElement([
                    'eligibly_email_1_sent',
                    'eligibly_email_2_sent',
                    'eligibly_email_3_sent',
                    'eligibly_email_4_sent',
                ])
            ];
        });
    }

    public function manualMatch() {
        return $this->state(function (array $attributes) {
            return [
                'match_status' => 'manual',
            ];
        })->has(
            ReferredAlias::factory(2)
        );
    }
}
