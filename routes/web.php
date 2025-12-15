<?php

use App\Http\Controllers\KanblueProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\UsuarisController;
use Illuminate\Support\Facades\Route;

/* LOGIN */
Route::get('/Login', [KanblueProfileController::class, 'profile']);
Route::post('/Login', [KanblueProfileController::class, 'login']);

/* REGISTRO */
Route::get('/Registro', [UsuariController::class, 'index']);
Route::post('/Registro', [KanblueProfileController::class, 'store'])->name('registar.store');

Route::middleware('auth')->group(function () {

    /* EDITAR PERFIL */
    Route::get('/datosUsuario/{id_usuario}', [UsuarisController::class, 'edit'])->name('usuaris.edit');
    Route::put('/datosUsuario/{id_usuario}', [UsuarisController::class, 'update'])->name('usuaris.update');

    /* PROYECTOS */
    Route::get('/proyectos', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/crearProyecto/{usuario}', [ProjectController::class, 'create'])->name('projects.crearProyecto');
    Route::get('/proyectos/{id}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/crearProyecto/{usuario}', [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/updateProyecto/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::put('/deleteProyecto/{id_proyecto}', [ProjectController::class, 'deactivate'])->name('projects.delete');

    /* TAREAS */
    Route::get('/proyectos/{id}/tareas', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/crearTarea/{id_proyecto}', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/editarTarea/{id_tarea}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('/stats/{id_proyecto}', [TaskController::class, 'showCharts'])->name('tasks.chart');
    Route::post('/crearTarea/{project}', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/editarTarea/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::put('/deleteTarea/{id_tarea}', [TaskController::class, 'deactivate'])->name('tasks.delete');

    /* ACTUALIZAR ESTADO POR ARRASTRE */
    Route::put('/updateStatus/{taskId}/{status}', [TaskController::class, 'updateStatus']);

    /*CERRAR SESIÓN*/
    Route::post('/logout', [KanblueProfileController::class, 'logout'])->name('logout');
});

/*REDIRECCIÓN A LOGIN EN CASO DE PONER RUTA NO VALIDA (404) */
Route::fallback(function () {
    return redirect('/Login');
});
