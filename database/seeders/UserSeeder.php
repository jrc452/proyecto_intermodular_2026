<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //Administrador
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@estilizacitas.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'peluqueria_id' => 1
        ]);

        //Clientes
        User::factory(10)->create([
            'role' => 'cliente'
        ]);
    }
}
