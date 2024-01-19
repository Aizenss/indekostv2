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
            'nama_kamar' => $this->faker->word,
            'kapasitas' => $this->faker->numberBetween(1, 10),
            'fasilitas' => json_encode(array_map(function ($word) {
                return ['value' => $word];
            }, $this->faker->words(4, false))),
            'peraturan_kamar' => $this->faker->word,
            'kamar_mandi' => $this->faker->word,
            'foto_kamar' => json_encode(['https://source.unsplash.com/random']),
            'harga' => $this->faker->numberBetween(100000, 1000000),
            'night' => $this->faker->numberBetween(1, 12),
        ];
    }
}
