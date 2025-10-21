<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KanblueProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/editar',[KanblueProfileController::class,'profile']);
Route::get('/proyecto',[KanblueProfileController::class,'proyect']);

Route::get('/tasks', [TaskController::class, 'index']);
