<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KanblueProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login', [KanblueProfileController::class, 'profile']);

// NUEVA RUTA PARA REGISTRO
Route::get('/Registro', function () {
    return view('kanblueRegistro'); // Aquí va tu blade
});
Route::get('/tasks', [TaskController::class, 'index']);
