<?php

namespace Database\Factories;

use App\Models\Dia;
use App\Models\Horario;
use App\Models\User;
use App\Models\Visita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'user_id' => User::factory(),
            'visita_id' => fake()->numberBetween(1, 5),
            'dia_id' => fake()->numberBetween(1, 5),
            'horario_id' => fake()->numberBetween(1, 5),
        ];
    }
}
