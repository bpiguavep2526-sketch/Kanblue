<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KanblueProfileController extends Controller
{
public function login(Request $request)
{
    $usuario = Usuari::where('username', $request->input('username'))->first();

    if ($usuario && Hash::check($request->input('password'), $usuario->password)) {
        // Si el usuario y contraseña son correctos
        return redirect('/pantallaproyectos');
    } else {
        // Si son incorrectos
        return back()->withInput()->with('error', 'Usuario o contraseña incorrecta');
    }
}

public function store(Request $request)
{
    $usuario=new Usuaris();
    $usuario-> username=$request->input('username');
    $usuario-> email=$request->input('email');
    $hashedpassword = Hash::make($request-> input('password'));
    $usuario-> password = $hashedpassword;
    $usuario-> save();

}

    public function profile() {
        return view('Kanbluelogin');
    }

    public function proyect() {
        return view('EditarProyecto');
    }

    public function editarperfil() {
        return view('EditarPerfil');
    }
}
