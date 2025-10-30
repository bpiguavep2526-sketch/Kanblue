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
Route::get('/editarTarea',[TareasController::class,'index']) ->name('editarTarea');
Route::get('/proyecto',[KanblueProfileController::class,'proyect']);
Route::get('/Login', [KanblueProfileController::class, 'profile']);


// NUEVA RUTA PARA REGISTRO
Route::get('/Registro', function () {   
    return view('kanblueRegistro'); // Aquí va tu blade
});
Route::resource('/tasks', TaskController::class,);

Route::resource('proyectos', ProyectoController::class);

