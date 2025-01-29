<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alumno')->insert([
            [
                'nombre' => 'Juan Pérez',
                'telefono' => '1234567890',
                'edad' => 25,
                'password' => Hash::make('password123'),
                'email' => 'juan.perez@example.com',
                'sexo' => 'Masculino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María Gómez',
                'telefono' => '0987654321',
                'edad' => 22,
                'password' => Hash::make('password456'),
                'email' => 'maria.gomez@example.com',
                'sexo' => 'Femenino',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}