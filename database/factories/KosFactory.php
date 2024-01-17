<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kos>
 */
class KosFactory extends Factory
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
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 100000, 1000000),
            'description' => $this->faker->text(200),
            'image' => $this->faker->imageUrl(640, 480, 'kost'),
        ];
    }
}
