<?php

namespace Database\Factories;

use App\Models\TipoVisita;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visita>
 */
class VisitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao' => fake()->unique()->safeEmail(),
            'tipo_visita_id' => fake()->numberBetween(1, 5)
        ];
    }
}
