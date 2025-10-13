<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KanblueProfileController extends Controller
{
    public function profile(){
        return view('EditarPerfil');

  
    }

   public function proyect(){
    return view('EditarProyecto');
  }
}