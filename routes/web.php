<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/agenda', [AdminController::class, 'agenda'])
        ->name('admin.agenda');
});

Route::get('/admin/eventos', [AdminController::class, 'eventos'])
    ->name('admin.eventos');

Route::put('/admin/reserva/{id}/estado', [AdminController::class, 'actualizarEstado'])
    ->name('admin.reserva.estado');

/*return redirect()
    ->route('reservas.confirmacion', $reserva->id);*/

Route::get('/reservas/{id}/confirmacion', [ReservaController::class, 'confirmacion'])
    ->name('reservas.confirmacion');
