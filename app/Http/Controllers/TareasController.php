<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Http\Requests\StoreTareasRequest;
use App\Http\Requests\UpdateTareasRequest;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.editartareas');
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
    public function store(StoreTareasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareasRequest $request, Tareas $tareas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tareas $tareas)
    {
        //
    }
}
