<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id'=> Role::IS_USER,
        ];
    }

    /**
     * Indicate that the user is admin.
     */
    public function asAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => Role::IS_ADMIN,
        ]);
    }

    /**
     * Indicate that the user is a manager
     */
    public function asManager(): static
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => Role::IS_MANAGER,
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user clicked "Remember me"
     */
    public function rememberTrue(): static
    {
        return $this->state(fn (array $attributes) => [
            'remember_token' => Str::random(10),
        ]);
    }
}
