<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reserva::create([
            'user_id' => 2,
            'peluqueria_id' => 1,
            'empleado_id' => 1,
            'servicio_id' => 1,
            'fecha' => now()->addDays(2)->format('Y-m-d'),
            'hora_inicio' => '10:00:00',
            'hora_fin' => '11:00:00',
            'estado' => 'confirmada'
        ]);
    }
}
