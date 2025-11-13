<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KanblueProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/editarperfil',[KanblueProfileController::class,'editarperfil']);

Route::get('/editarTarea',[TaskController::class,'edit']) ->name('tasks.edit');
Route::get('/pantallaproyectos',[ProjectController::class,'index']);

Route::get('/proyecto',[KanblueProfileController::class,'proyect']);
Route::get(('/KanblueProfile'),[KanblueProfileController::class,'kanblueprofile']) ->name('KanblueProfile');

Route::get('/Login', [KanblueProfileController::class, 'profile']);
Route::post('/Login', [KanblueProfileController::class, 'Login']);

Route::get('/Registro', function () {
    return view('kanblueRegistro');
});
Route::post('/Registro', [KanblueProfileController::class, 'registrarUsuario']);

Route::resource('tasks', TaskController::Class);

Route::put('/updateStatus/{taskId}', [TaskController::class, 'updateStatus']);

Route::get('/proyectos/{id}/tareas', [ProjectController::class, 'show'])->name('projects.show');
