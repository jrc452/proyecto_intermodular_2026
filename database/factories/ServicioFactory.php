<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $duracion = $this->faker->randomElement([30, 45, 60]);

        return [
            'peluqueria_id' => 1,
            'nombre' => $this->faker->randomElement([
                'Corte',
                'Tinte',
                'Mechas',
                'Peinado'
            ]),
            'descripcion' => $this->faker->sentence(),
            'duracion_minutos' => $duracion,
            'precio' => $this->faker->randomFloat(2, 10, 60),
            'activo' => true
        ];
    }
}
