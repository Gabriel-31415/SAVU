<?php

namespace Database\Factories;

use App\Models\Dia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'horario' => fake()->time($format = 'H:i:s', $max = 'now'),
            'dia_id' => fake()->numberBetween(1, 5)
        ];
    }
}
