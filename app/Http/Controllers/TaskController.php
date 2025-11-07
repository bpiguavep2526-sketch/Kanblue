<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tipus;
use App\Models\Usuaris;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Task::all();
        $usuarios = Usuaris::all();
        $tipostarea = Tipus::all();
        
        return view('tasks.taskscreen', compact('tareas', 'usuarios', 'tipostarea'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /*Recibe la petición, busca en la base de datos la tarea con la misma ID, cambia su estado y lo guarda.*/
    public function updateStatus(Request $request, string $id)
    {
        $status = $request->input('status');

        $task = Task::where('id', $id)->first();

        $task->status = $status;
        $task->save();
    }
}
