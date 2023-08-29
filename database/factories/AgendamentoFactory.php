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
            'user_id' => User::factory(),
            'visita_id' => Visita::find(1)->id,
            'dia_id' => Dia::factory(),
            'horario_id' => Horario::factory(),
        ];
    }
}
