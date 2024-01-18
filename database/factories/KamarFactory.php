<?php

namespace Database\Factories;

use App\Models\Kos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
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
            'kos_id' => Kos::inRandomOrder()->first()->id,
            'nama_kamar' => $this->faker->word,
            'fasilitas' => $this->faker->sentence,
            'kamar_mandi' => $this->faker->word,
            'foto_kamar' => json_encode([$this->faker->imageUrl(640, 480, 'room', true)]),
            'harga' => $this->faker->numberBetween(100000, 1000000),
            'night' => $this->faker->numberBetween(1, 12),
        ];
    }
}
