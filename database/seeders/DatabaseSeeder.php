<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        DB::table('users')->insert([
            'name' => 'Admin',
            'cpf' => '12345678912',
            'telefone' => '12345678912',
            'whatsapp' => '12345678912',
            'email' => 'admin@gmail.com',
            'tipo' => User::TIPO_ENUM['admin'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'cpf' => '12345678912',
            'telefone' => '12345678912',
            'whatsapp' => '12345678912',
            'email' => 'user@gmail.com',
            'tipo' => User::TIPO_ENUM['user'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'professor',
            'cpf' => '12345678912',
            'telefone' => '12345678912',
            'whatsapp' => '12345678912',
            'email' => 'professor@gmail.com',
            'tipo' => User::TIPO_ENUM['professor'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        
        // DB::table('tipo_visitas')->insert([
        //     'nome' => 'Laboratório de Microorganismos de rúmen',
        //     'descricao' => 'Visita a Laboratório de Microorganismos de rúmen',
        //     'duracao' => '1h',
        // ]);
        
        // DB::table('tipo_visitas')->insert([
        //     'nome' => 'Polinização',
        //     'descricao' => 'Visita a Polinização',
        //     'duracao' => '1h',
        // ]);
        
        // DB::table('tipo_visitas')->insert([
        //     'nome' => 'Museu de Ciência Animal',
        //     'descricao' => 'Visita ao Museu de Ciência Animal',
        //     'duracao' => '1h',
        // ]);
        
        // DB::table('tipo_visitas')->insert([
        //     'nome' => 'Exposição de solos',
        //     'descricao' => 'Visita a exposição de solos',
        //     'duracao' => '1h',
        // ]);
        
        // DB::table('tipo_visitas')->insert([
        //     'nome' => 'UFAPE: cursos e instalações',
        //     'descricao' => 'Visita a UFAPE: cursos e instalações',
        //     'duracao' => '1h',
        // ]);

        // \App\Models\User::factory(10)->create();
        // // \App\Models\TipoVisita::factory(4)->create();
        // \App\Models\Visita::factory(10)->create();
        // \App\Models\Dia::factory(10)->create();
        // \App\Models\Horario::factory(10)->create();
        // \App\Models\Agendamento::factory(10)->create();
        // \App\Models\Foto::factory(10)->create();
    }
}