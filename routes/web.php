<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KanblueProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/editarperfil',[KanblueProfileController::class,'editarperfil']);

Route::get('/editarTarea',[TaskController::class,'edit']) ->name('tasks.edit');

Route::get('/pantallaproyectos',[ProjectController::class,'index']);
Route::get('/crearProyecto/{usuario}', [ProjectController::class, 'create'])->name('projects.crearProyecto');


Route::get('/proyecto',[KanblueProfileController::class,'proyect']);
Route::get(('/KanblueProfile'),[KanblueProfileController::class,'kanblueprofile']) ->name('KanblueProfile');

Route::get('/Login', [KanblueProfileController::class, 'profile']);
Route::post('/Login', [KanblueProfileController::class, 'Login']);

Route::get('/Registro',[UsuariController::class,'index']);
Route::post('/Registro', [KanblueProfileController::class, 'store'])-> name ('registar.store');

Route::resource('tasks', TaskController::Class);

Route::get('/proyectos/{id}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/crearProyecto/{usuario}', [ProjectController::class, 'store'])->name('projects.store');
Route::post('/updateProyecto', [ProjectController::class, 'update'])->name('projects.update');



Route::put('/updateStatus/{taskId}/{status}', [TaskController::class, 'updateStatus']);

Route::get('/proyectos/{id}/tareas', [ProjectController::class, 'show'])->name('projects.show');
