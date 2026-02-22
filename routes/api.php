<?php

use App\Http\Controllers\ReservaController;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::get('/disponibilidad', [
    ReservaController::class,
    'disponibilidad'
]);
