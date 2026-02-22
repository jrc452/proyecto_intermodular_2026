<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function agenda()
    {
        return view('admin.agenda');
    }

    public function eventos()
    {
        $reservas = Reserva::with(['user', 'servicio', 'empleado'])->get();

        $eventos = $reservas->map(function ($reserva) {

            $color = match ($reserva->estado) {
                'confirmada' => '#28a745',
                'pendiente' => '#ffc107',
                'cancelada' => '#dc3545',
                'completada' => '#007bff',
                default => '#6c757d'
            };

            return [
                'id' => $reserva->id,
                'title' => $reserva->servicio->nombre . ' - ' . $reserva->user->name,
                'start' => $reserva->fecha . 'T' . $reserva->hora_inicio,
                'end'   => $reserva->fecha . 'T' . $reserva->hora_fin,
                'color' => $color,
            ];
        });

        return response()->json($eventos);
    }

    public function actualizarEstado(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $request->validate([
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada'
        ]);

        $reserva->estado = $request->estado;
        $reserva->save();

        return response()->json([
            'success' => true,
            'estado' => $reserva->estado
        ]);
    }
}
