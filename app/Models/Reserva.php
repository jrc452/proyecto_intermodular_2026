<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'peluqueria_id',
        'empleado_id',
        'servicio_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peluqueria()
    {
        return $this->belongsTo(Peluqueria::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
