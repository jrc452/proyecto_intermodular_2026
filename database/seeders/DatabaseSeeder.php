<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Peluqueria;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\Reserva;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            PeluqueriaSeeder::class,
            UserSeeder::class,
            EmpleadoSeeder::class,
            ServicioSeeder::class,
            HorarioSeeder::class,
            ReservaSeeder::class,
        ]);

        // Peluqueria::factory()->count(1)->create();
        User::factory()->count(20)->create([
            'role' => 'cliente'
        ]);
        //Empleado::factory()->count(5)->create();
        //Servicio::factory()->count(6)->create();
        //Reserva::factory()->count(50)->create();
    }
}
