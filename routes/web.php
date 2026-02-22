<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
