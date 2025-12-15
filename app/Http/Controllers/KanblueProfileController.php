<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KanblueProfileController extends Controller
{
     /**
     * Inicia sesión de un usuario existente.
     *
     * Busca el usuario por su nombre de usuario, valida la contraseña,
     * y en caso de éxito, inicia sesión y redirige a la página principal de proyectos.
     *
     * @param \Illuminate\Http\Request $request  Request con los campos 'username' y 'password'.
     * @return \Illuminate\Http\RedirectResponse  Redirección a la vista de proyectos o de vuelta al login con error.
     */
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

       /**
     * Registra un nuevo usuario en la base de datos.
     *
     * Valida los campos del formulario, comprueba duplicados y guarda el nuevo usuario en caso de éxito.
     *
     * @param \Illuminate\Http\Request $request  Request con los datos del nuevo usuario.
     * @return \Illuminate\Http\RedirectResponse  Redirige a la vista de login o de vuelta al formulario con error.
     */
    public function store(Request $request)
    {
        if (! $request->filled('username')) {
            return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
        } elseif (! $request->filled('email')) {
            return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
        } elseif (! $request->filled('password') || ! $request->filled('passwordconfirm')) {
            return back()->withInput()->with('error', 'Rellena todos los campos y comprueba que la contraseña sea igual.');
        } elseif ($request->input('password') != $request->input('passwordconfirm')) {
            return back()->withInput()->with('error', 'Las contraseñas no són iguales');
        } elseif (Usuaris::whereRaw('LOWER(username) = ?', [Str::lower($request->input('username'))])->exists()) {
            return back()->withInput()->with('error', 'El nombre de usuario ya está en uso');
        } elseif (Usuaris::whereRaw('LOWER(email) = ?', [Str::lower($request->input('email'))])->exists()) {
            return back()->withInput()->with('error', 'El correo electrónico ya está en uso');
        } else {
            $usuario = new Usuaris;
            $usuario->username = $request->input('username');
            $usuario->email = $request->input('email');
            $hashedpassword = Hash::make($request->input('password'));
            $usuario->password = $hashedpassword;
            $usuario->save();

            return redirect('/Login');
        }
    }

     /**
     * Cierra la sesión del usuario actual y limpia los datos de sesión.
     *
     * @return \Illuminate\Http\RedirectResponse  Redirige a la vista de login.
     */
    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect('/Login');
    }

    /**
     * Muestra la vista de login o redirige a la lista de proyectos si el usuario se ha dejado la sesión abierta.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function profile()
    {
        if (Auth::check()) {
            return redirect()->route('projects.index');
        }

        return view('Kanbluelogin');
    }

    /**
     * Muestra la vista de edición de proyectos.
     *
     * @return \Illuminate\View\View
     */
    public function proyect()
    {
        return view('projects.edit');
    }

    /**
     * Muestra la vista de edición del perfil del usuario.
     *
     * @return \Illuminate\View\View
     */
    public function editarperfil()
    {
        return view('EditarPerfil');
    }
}
