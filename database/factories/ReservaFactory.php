<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $empleado = Empleado::inRandomOrder()->first();
        $servicio = Servicio::inRandomOrder()->first();
        $cliente = User::where('role', 'cliente')->inRandomOrder()->first();

        $fecha = Carbon::now()->addDays(rand(1, 15));

        $horaInicio = Carbon::createFromTime(rand(9, 17), 0, 0);
        $horaFin = (clone $horaInicio)->addMinutes($servicio->duracion_minutos);

        // Verificar colisión
        $existe = Reserva::where('empleado_id', $empleado->id)
            ->where('fecha', $fecha->format('Y-m-d'))
            ->where('hora_inicio', $horaInicio->format('H:i:s'))
            ->exists();

        if ($existe) {
            return $this->definition(); // Reintenta
        }

        return [
            'user_id' => $cliente->id,
            'peluqueria_id' => $empleado->peluqueria_id,
            'empleado_id' => $empleado->id,
            'servicio_id' => $servicio->id,
            'fecha' => $fecha->format('Y-m-d'),
            'hora_inicio' => $horaInicio->format('H:i:s'),
            'hora_fin' => $horaFin->format('H:i:s'),
            'estado' => $this->faker->randomElement([
                'confirmada',
                'pendiente',
                'completada'
            ])
        ];
    }
}
