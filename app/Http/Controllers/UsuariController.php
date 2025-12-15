<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Models\Usuaris;
use Illuminate\Http\Request;

class UsuariController extends Controller
{
    /**
     * Muestra la vista para registrar un nuevo usuario.
     *
     * @return \Illuminate\View\View Vista del formulario de registro de usuario.
     */
    public function index()
    {
        $users = Usuaris::all();
        return view('KanblueRegistro', compact('users'));
    }
}
