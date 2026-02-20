<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'peluqueria_id',
        'nombre',
        'descripcion',
        'duracion_minutos',
        'precio',
        'activo',
    ];

    public function peluqueria()
    {
        return $this->belongsTo(Peluqueria::class);
    }
}
