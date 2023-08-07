<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Features;
use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Model;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    protected bool $generate_tokens = false;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null        
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function withTokens(): static
    {
        $clone = clone $this;
        $clone->generate_tokens = true;
        return $clone;
    }

    public function withAdminRole(): static
    {
        return $this->hasAttached(Role::where('type', 'client_admin')->get());
    }

    public function withWinkRole(): static
    {
        return $this->hasAttached(Role::where('type', 'wink_admin')->get());
    }

    public function withUserRole(): static
    {
        return $this->hasAttached(Role::where('type', 'app_user')->get());
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }

    public function create($attributes = [], ?Model $parent = null)
    {
        $users = parent::create($attributes, $parent);
        if($this->generate_tokens) {
            $users->each(
                fn($user) => collect(range(0, fake()->numberBetween(0, 3)))
                    ->each(fn() =>  DB::table('personal_access_tokens')->insert([
                        'name' => fake()->name(), 
                        'last_used_at' => fake()->dateTimeBetween('-6 months'),
                        'tokenable_type' => 'App\Models\User',
                        'tokenable_id' => $user->id,
                        'token' => fake()->uuid(),
                        'abilities' => '[*]',
                        'created_at' => fake()->dateTimeBetween('-6 months'),
                        'updated_at' => fake()->dateTimeBetween('-6 months'),
                ])
                )
            );
        }
       
        return $users;
    }
}
