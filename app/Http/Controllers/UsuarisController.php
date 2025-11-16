<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuaris $usuaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_usuario)
    {
        $user = Usuaris::find($id_usuario);
        return view('EditarPerfil', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_usuario)
    {
    $user = Usuaris::find($id_usuario);

    if ($request->filled('email') && $user->email != $request->input('email')) {
        if (Usuaris::whereRaw('LOWER(email) = ?', [Str::lower($request->input('email'))])->exists()) {
        return back()->withInput()->with('error', 'El correo electrónico ya está en uso');
        } else {
            $user->email = $request->email;
        }
    } 

    if ($request->filled('username') && $user->username != $request->input('username')) {
        if (Usuaris::whereRaw('LOWER(username) = ?', [Str::lower($request->input('username'))])->exists()) {
        return back()->withInput()->with('error', 'El nombre de usuario ya está en uso');
        } else {
            $user->username = $request->username;
        }
    }

    if ($request->filled('password')) {
        if ($request->input('password') == $request->input('passwordconfirm')) {
            $user->password = Hash::make($request->input('password'));
        } else {
            return back()->withInput()->with('error', 'Las contraseñas no son iguales');
        }
    }

    $user->save();

    return back()->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuaris $usuaris)
    {
        //
    }
}
