<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'peluqueria_id',
        'nombre',
        'especialidad',
        'activo',
    ];

    public function peluqueria()
    {
        return $this->belongsTo(Peluqueria::class);
    }
}
