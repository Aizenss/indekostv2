<?php

namespace Database\Factories;

use App\Models\User;
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
            'owner_id' => User::where('role', 'owner')->inRandomOrder()->first()->id,
            'nama_kost' => $this->faker->words(3, true),
            'ketentuan' => $this->faker->randomElement(['Laki-Laki', 'Perempuan', 'Campur']),
            'lokasi' => $this->faker->address,
            'spesifikasi' => $this->faker->sentence,
            'peraturan' => $this->faker->text(200),
            'fasilitas_umum' => json_encode(array_map(function($word) {
                return ['value' => $word];
            }, $this->faker->words(4, false))),
            'fasilitas_kamar_mandi' => $this->faker->words(2, true),
            'fasilitas_tempat_parkir' => $this->faker->words(2, true),
            'status' => $this->faker->randomElement(['pending', 'setuju']),
            'foto_depan' => $this->faker->image(public_path('kosts'), 640, 480, null, false),
            'foto_dalam' => $this->faker->image(public_path('kosts'), 640, 480, null, false),
            'foto_tambahan' => json_encode([$this->faker->image(public_path('kosts'), 640, 480, null, false)]),
        ];
    }
}

