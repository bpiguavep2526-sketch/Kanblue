<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KanblueProfileController;
use App\Http\Controllers\TareasController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/perfil',[KanblueProfileController::class,'profile']);
Route::get('/editarTarea',[TareasController::class,'index']);

Route::get('/Login', [KanblueProfileController::class, 'profile']);

Route::get('/Registro', function () {
    return view('kanblueRegistro'); 
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::put('/updateStatus/{taskId}', [TaskController::class, 'updateStatus']);
