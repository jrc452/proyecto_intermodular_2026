<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['L', 'M', 'X', 'J', 'V'] as $dia) {
            Horario::create([
                'empleado_id' => 1,
                'dia_semana' => $dia,
                'hora_inicio' => '09:00:00',
                'hora_fin' => '14:00:00'
            ]);

            Horario::create([
                'empleado_id' => 1,
                'dia_semana' => $dia,
                'hora_inicio' => '16:00:00',
                'hora_fin' => '19:00:00'
            ]);
        }
    }
}
