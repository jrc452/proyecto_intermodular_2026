<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'peluqueria_id' => 1,
            'nombre' => $this->faker->name(),
            'especialidad' => $this->faker->randomElement([
                'Coloración',
                'Corte masculino',
                'Peinados',
                'Tratamientos capilares'
            ]),
            'activo' => true
        ];
    }
}
