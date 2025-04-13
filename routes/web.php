<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ParticipacionController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas públicas (sin autenticación)
Route::resource('eventos', EventoController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('participaciones', ParticipacionController::class);

// Puedes mantener esto si tienes login/register activos con Breeze o UI
#require __DIR__.'/auth.php';
