<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KanblueProfileController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\ProyectoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/editarperfil',[KanblueProfileController::class,'editarperfil']);
Route::get('/editarTarea',[TareasController::class,'index']);
Route::get('/proyecto',[KanblueProfileController::class,'proyect']);
Route::get('/Login', [KanblueProfileController::class, 'profile']);


// NUEVA RUTA PARA REGISTRO
Route::get('/Registro', function () {   
    return view('kanblueRegistro'); // Aquí va tu blade
});
Route::get('/tasks', [TaskController::class, 'index']);

Route::resource('proyectos', ProyectoController::class);

