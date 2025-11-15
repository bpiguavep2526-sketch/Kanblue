<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use Illuminate\Http\Request;

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
        $user = User::find($id_usuario);
        if ($request->input('email') != null){
            $user->email = $request->input('email');
        }
        if ($request->input('username') != null){
            $user->email = $request->input('username');
        }
        if ($request->input('password'!= null)){
            if($request->input('passwordconfirm' != null && $request->input('password') == $request->input('passwordconfirm'))){
                $hashedpassword = Hash::make($request-> input('password'));
                $user->password = $hashedpassword;
            } else {
                return back()->withInput()->with('error', 'Las contraseñas no son iguales');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuaris $usuaris)
    {
        //
    }
}
