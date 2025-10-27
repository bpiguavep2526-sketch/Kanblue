<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KanblueProfileController extends Controller
{
    public function profile(){
        return view('Kanbluelogin');
       
  
    }

   public function proyect(){
    return view('EditarProyecto');
  }
  

  public function editarperfil(){
    return view('EditarPerfil');
  }
}