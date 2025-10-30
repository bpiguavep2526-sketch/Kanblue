<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuari;

class KanblueProfileController extends Controller
{
    public function login(Request $request) 
    {
        $usuario = Usuari::where('username', $request->input('username'))->first();

        if ($usuario && Hash::check($request->input('password'), $usuario->password)) {
            return redirect('/')->with('success', 'Bienvenido bro 👍');
        } else {
            return back()->withInput()->with('error', 'Usuario o contraseña incorrecta');
        }
    }

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
