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


Route::get('/pantallaproyectos',[ProjectController::class,'index'])->name('projects.index');
Route::get('/crearProyecto/{usuario}', [ProjectController::class, 'create'])->name('projects.crearProyecto');
Route::get('/proyectos/{id}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/crearProyecto/{usuario}', [ProjectController::class, 'store'])->name('projects.store');
Route::put('/updateProyecto/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::get('/proyecto',[KanblueProfileController::class,'proyect']);
Route::get(('/KanblueProfile'),[KanblueProfileController::class,'kanblueprofile']) ->name('KanblueProfile');

Route::get('/Login', [KanblueProfileController::class, 'profile']);
Route::post('/Login', [KanblueProfileController::class, 'Login']);

Route::get('/Registro',[UsuariController::class,'index']);
Route::post('/Registro', [KanblueProfileController::class, 'store'])->name('registar.store');

Route::get('tasks', [TaskController::Class, 'index'])->name('tasks.index');
Route::get('/crearTarea/{id_proyecto}',[TaskController::class,'create']) ->name('tasks.create');
Route::get('/editarTarea/{id_tarea}',[TaskController::class,'edit']) ->name('tasks.edit');
Route::post('/crearTarea/{project}', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/editarTarea/{task}', [TaskController::class, 'update'])->name('tasks.update');


Route::put('/updateStatus/{taskId}/{status}', [TaskController::class, 'updateStatus']);

Route::get('/proyectos/{id}/tareas', [ProjectController::class, 'show'])->name('projects.show');
