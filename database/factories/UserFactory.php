<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // or 'password' => Hash::make('password'),
            'role' => $this->faker->randomElement(['user', 'owner']),
            'no_telp' => $this->faker->phoneNumber(),
            'pendapatan' => $this->faker->numberBetween(1000000, 5000000),
            'email_verified_at' => now(),
        ];
    }
}
