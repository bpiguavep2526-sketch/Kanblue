<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tipus;
use App\Models\Status;
use App\Models\Project;
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
    public function create(string $id_proyecto)
    {
        $tipostarea = Tipus::all();
        $project = Project::find($id_proyecto);
        $tarea = null;
        $usuarios = Usuaris::all();
        $estados = Status::all();

        return view('tasks.edit', compact('tarea', 'project', 'usuarios', 'tipostarea', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_proyecto)
    {
        $task= new Task();
        if(!$request->filled('titulo')){
            return back()->withInput()->with('error', 'Rellena todos los campos.');
        } else if (!$request->filled('descripcion')){
            return back()->withInput()->with('error', 'Rellena todos los campos.');
        } else {
            $task->titulo=$request->input('titulo');
            $task->descripcion=$request->input('descripcion');
             $estado = Status::where('ESTADO.nom', $request->input('estado'))->first();
            $user = Usuaris::where('USUARIO.username', $request->input('usuario'))->first();
            $tipus = Tipus::where('TIPUS.nom', $request->input('tipo'))->first();
            $project = Project::find($id_proyecto);
            $task->id_estado = $estado->id_estado;
            $task->id_proyecto = $project->id_proyecto;
            $task->id_tipus = $tipus->id_tipus;
            $task->id_usuario = $user->id_usuario;
            $task->activo = 1;
            $task-> save();
            return back()->with('success', 'Tarea creada correctamente');
        }
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
    public function edit(string $id_tarea)
    {
        $tarea = Task::find($id_tarea);
        $usuarios = Usuaris::all();
        $tipostarea = Tipus::all();
        $estados = Status::all();
        $project = Project::find($tarea->id_proyecto);

        return view('tasks.edit', compact('tarea', 'usuarios', 'tipostarea', 'estados', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        if ($request->input('titulo') != null){
            $task->titulo = $request->input('titulo');
        }
        if ($request->input('descripcion') != null){
            $task->descripcion = $request->input('descripcion');
        }
        $estado = Status::where('ESTADO.nom', $request->input('estado'))->first();
        $user = Usuaris::where('USUARIO.username', $request->input('usuario'))->first();
        $tipus = Tipus::where('TIPUS.nom', $request->input('tipo'))->first();
        $task->id_estado = $estado->id_estado;
        $task->id_tipus = $tipus->id_tipus;
        $task->id_usuario = $user->id_usuario;
        $task-> save();
        return back()->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tarea)
    {
        $tarea = Project::find($id_tarea);
        $tarea->activo = 0;
        $tarea->save();

        return redirect()->route('projects.show');
    }

    public function deactivate(string $id_tarea)
    {

        $tarea = Task::find($id_tarea);
        $tarea->activo = 0;
        $tarea->save();

        return redirect()->route('projects.show', $tarea->id_proyecto);
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
