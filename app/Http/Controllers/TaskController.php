<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\Tipus;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $tipostarea = Tipus::all();
        $task = null;
        $usuarios = Usuaris::all();
        $estados = Status::all();

        return view('tasks.edit', compact('task', 'usuarios', 'tipostarea', 'estados'));
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
    public function edit(Task $tarea)
    {
        $usuarios = Usuaris::all();
        $tipostarea = Tipus::all();
        $estados = Status::all();

        return view('tasks.edit', compact('tarea', 'usuarios', 'tipostarea', 'estados'));
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

    /* Recibe la petición, busca en la base de datos la tarea con la misma ID, cambia su estado y lo guarda. */
    public function updateStatus(string $taskId, string $status)
    {

        $taskId = (int) $taskId; // por seguridad
        $task = Task::find($taskId);

        if (! $task) {
            Log::error("Task no encontrada con id_tarea=$taskId");

            return;
        }

        $statusBD = Status::where('nom', $status)->first();

        if (! $statusBD) {
            Log::error("Status no encontrado con nom=$status");

            return;
        }

        $task->id_estado = $statusBD->id_estado;
        $task->save();

        Log::info("Task actualizada correctamente: id_tarea={$task->id_tarea}, id_estado={$task->id_estado}");

    }
}
