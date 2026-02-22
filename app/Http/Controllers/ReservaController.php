<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function disponibilidad(Request $request)
    {
        $empleadoId = $request->empleado_id;
        $servicioId = $request->servicio_id;
        $fecha = $request->fecha;

        $servicio = Servicio::findOrFail($servicioId);
        $duracion = $servicio->duracion_minutos;

        $diaSemana = Carbon::parse($fecha)->locale('es')->isoFormat('dd');
        $mapaDias = [
            'lu' => 'L',
            'ma' => 'M',
            'mi' => 'X',
            'ju' => 'J',
            'vi' => 'V',
            'sá' => 'S',
            'do' => 'D',
        ];

        $dia = $mapaDias[strtolower($diaSemana)] ?? null;
        $horarios = Horario::where('empleado_id', $empleadoId)->where('dia_semana', $dia)->get();
        $reservas = Reserva::where('empleado_id', $empleadoId)->where('fecha', $fecha)->get();

        $disponibles = [];

        foreach ($horarios as $horario) {
            $inicio = Carbon::createFromTimeString($horario->hora_inicio);
            $fin = Carbon::createFromTimeString($horario->hora_fin);

            while ($inicio->copy()->addMinutes($duracion) <= $fin) {
                $horaInicio = $inicio->format('H:i:s');
                $horaFin = $inicio->copy()->addMinutes($duracion)->format('H:i:s');

                $solapado = $reservas->contains(function ($reserva) use ($horaInicio, $horaFin) {
                    return (
                        $horaInicio < $reserva->hora_fin && $horaFin > $reserva->hora_inicio
                    );
                });

                if (!$solapado) $disponibles[] = $horaInicio;

                $inicio->addMinutes(30);
            }
        }
        return response()->json($disponibles);
    }
}
