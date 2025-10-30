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


Route::get('/Registro', function () {   
    return view('kanblueRegistro');
});
Route::get('/tasks', [TaskController::class, 'index']);

Route::put('/updateStatus/{taskId}', [TaskController::class, 'updateStatus']);
Route::resource('proyectos', ProyectoController::class);

