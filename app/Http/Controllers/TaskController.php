<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tipus;
use App\Models\Status;
use App\Models\Usuaris;
use App\Classes\TaskClass;
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
        $tipostarea = Tipus::all();
        $task = null;
        $usuarios = Usuaris::all();
        $estados = Status::all();

        return view('tasks.edit', compact('task',  'usuarios', 'tipostarea', 'estados'));
    }
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'id_usuario' => 'required|exists:USUARIO,id_usuario', 
            'id_tipus' => 'required|exists:TIPUS,id_tipus', 
            'id_estado' => 'required|exists:ESTADO,id_estado', 
        ]);


       $task= new Task();
       $task->titulo=$request->input('titulo');
       $task->descripcion=$request->input('descripcion');
       $task->id_proyectos=1;
       $task->id_usuario = $validatedData['id_usuario'];
        $task->id_tipus = $validatedData['id_tipus'];
        $task->id_estado = $validatedData['id_estado'];
       $task->save();
       
       return redirect()->route('tasks.index');
       
       
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
    public function edit(Task $task)
    {
        $usuarios = Usuaris::all();
        $tipostarea = Tipus::all();
        $estados = Status::all();

        return view('tasks.edit', compact('task',  'usuarios', 'tipostarea', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'id_usuario' => 'required|exists:USUARIO,id_usuario',
            'id_tipus' => 'required|exists:TIPUS,id_tipus',
            'id_estado' => 'required|exists:ESTADO,id_estado',
        ]);
        
        $task->titulo = $validatedData['titulo'];
        $task->descripcion = $validatedData['descripcion'];
        $task->id_usuario = $validatedData['id_usuario'];
        $task->id_tipus = $validatedData['id_tipus'];
        $task->id_estado = $validatedData['id_estado'];
        
        $task->save();
       
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
       
       
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
