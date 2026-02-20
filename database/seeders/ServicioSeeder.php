<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'peluqueria_id' => 1,
            'nombre' => 'Corte Mujer',
            'descripcion' => 'Corte y peinado',
            'duracion_minutos' => 60,
            'precio' => 25.00
        ]);

        Servicio::create([
            'peluqueria_id' => 1,
            'nombre' => 'Corte Hombre',
            'descripcion' => 'Corte clásico',
            'duracion_minutos' => 30,
            'precio' => 15.00
        ]);
    }
}
