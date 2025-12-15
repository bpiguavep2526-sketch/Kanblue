<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Muestra la vista del formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View  Vista de login del usuario.
     */
    public function profile(){
        return view('Kanbluelogin');
    
    }
}
