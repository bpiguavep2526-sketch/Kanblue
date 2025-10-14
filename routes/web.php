<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanblueProfileController;
use App\Http\Controllers\TareasController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/perfil',[KanblueProfileController::class,'profile']);
Route::get('/editarTarea',[TareasController::class,'index']);
