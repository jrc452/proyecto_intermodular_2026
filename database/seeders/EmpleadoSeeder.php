<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
            'peluqueria_id' => 1,
            'nombre' => 'Laura Martínez',
            'especialidad' => 'Coloración',
        ]);

        Empleado::create([
            'peluqueria_id' => 2,
            'nombre' => 'Carlos Ruiz',
            'especialidad' => 'Corte masculino',
        ]);
    }
}
