<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Models\Usuaris;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KanblueProfileController extends Controller
{
public function login(Request $request)
{
    $usuario = Usuaris::where('username', $request->input('username'))->first();

    if ($usuario && Hash::check($request->input('password'), $usuario->password)) {
        // Si el usuario y contraseña son correctos
        Auth::login($usuario);
        session(['usuario' => $usuario]);
        return redirect()->route('projects.index');
    } else {
        // Si son incorrectos
        return back()->withInput()->with('error', 'Usuario o contraseña incorrecta');
    }
}

public function store(Request $request)
{
    if(!$request->filled('username')){
        return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
    } else if (!$request->filled('email')){
        return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
    } else if (!$request->filled('password') || !$request->filled('passwordconfirm')){
        return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
    } else if ($request->input('password') != $request->input('passwordconfirm')){
        return back()->withInput()->with('error', 'Las contraseñas no són iguales');
    } else if (Usuaris::whereRaw('LOWER(username) = ?', [Str::lower($request->input('username'))])->exists()) {
        return back()->withInput()->with('error', 'El nombre de usuario ya está en uso');
    } else if (Usuaris::whereRaw('LOWER(email) = ?', [Str::lower($request->input('email'))])->exists()) {
        return back()->withInput()->with('error', 'El correo electrónico ya está en uso');
    } else {
        $usuario=new Usuaris();
        $usuario-> username=$request->input('username');
        $usuario-> email=$request->input('email');
        $hashedpassword = Hash::make($request-> input('password'));
        $usuario-> password = $hashedpassword;
        $usuario-> save();
        return redirect('/Login');
    }
}

/*Cerrar sesión, vaciar datos guardados*/
public function logout()
{
    Auth::logout();
    session()->flush();
    return redirect('/Login');
}

/*Comprueba que si, el usuario se ha dejado la sesión abierta, redireccione a la vista principal (proyectos) */
public function profile() {
    if (Auth::check()) {
        return redirect()->route('projects.index');
    }
    return view('Kanbluelogin');    
}

    public function proyect(){
        return view('projects.edit');
    }

    public function editarperfil() {
        return view('EditarPerfil');
    }
}


