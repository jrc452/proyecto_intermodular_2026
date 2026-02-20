<?php

namespace Database\Seeders;

use App\Models\Peluqueria;
use Illuminate\Database\Seeder;

class PeluqueriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peluqueria::create([
            'nombre' => 'Style & Cut',
            'direccion' => 'Calle Mayor 12, Madrid',
            'telefono' => '912345678',
            'email' => 'info@stylecut.com'
        ]);

        Peluqueria::create([
            'nombre' => 'Bella Imagen',
            'direccion' => 'Av. Andalucía 45, Sevilla',
            'telefono' => '954123456',
            'email' => 'contacto@bellaimagen.com'
        ]);
    }
}
