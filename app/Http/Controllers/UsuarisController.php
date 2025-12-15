<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarisController extends Controller
{
    /**
     * Muestra el formulario de edición del perfil de un usuario.
     *
     * @param string $id_usuario  ID del usuario a editar.
     * @return \Illuminate\View\View Vista de edición del perfil del usuario.
     */
    public function edit(string $id_usuario)
    {
        $user = Usuaris::find($id_usuario);
        return view('EditarPerfil', compact('user'));
    }

    /**
     * Actualiza los datos de un usuario específico.
     *
     * Valida que el email y el nombre de usuario sean únicos,
     * y que la contraseña coincida con su confirmación si se proporciona.
     *
     * @param \Illuminate\Http\Request $request  Datos enviados desde el formulario de edición.
     * @param string $id_usuario  ID del usuario a actualizar.
     * @return \Illuminate\Http\RedirectResponse Redirige de vuelta con mensaje de éxito o error.
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
}
