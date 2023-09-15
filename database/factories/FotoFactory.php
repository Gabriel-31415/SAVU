<?php

namespace Database\Factories;

use App\Models\TipoVisita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foto>
 */
class FotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => fake()->imageUrl(640, 480, 'animals', true),
            'descricao' => fake()->name(),
            'tipo_visita_id' => fake()->numberBetween(1, 5)
        ];
    }
}
