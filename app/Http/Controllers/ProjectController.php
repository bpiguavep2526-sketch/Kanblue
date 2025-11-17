<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Tipus;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = session('usuario');
        $projects = Project::select('PROYECTOS.*')
            ->leftJoin('TAREAS', 'PROYECTOS.id_proyecto', '=', 'TAREAS.id_proyecto')
            ->leftJoin('CREAR', 'PROYECTOS.id_proyecto', '=', 'CREAR.id_proyecto')
            ->where('TAREAS.id_usuario', $usuario->id_usuario)
            ->orWhere('CREAR.id_usuario', $usuario->id_usuario)
            ->distinct()
            ->get();

        return view('projects.index', compact('projects', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_usuario)
    {
        $project = null;
        $usuario = Usuaris::find($id_usuario);

        return view('projects.edit', compact('project', 'usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_usuario)
    {
        if ($request->filled('nom') && $request->filled('descripcion')) {
            $project = new Project;
            $project->nom = $request->input('nom');
            $project->descripcion = $request->input('descripcion');
            $project->activo = 1;
            $project->save();

            $usuario = Usuaris::find($id_usuario);
            $usuario->Projects()->attach($project->id_proyecto);

            return back()->with('success', 'Proyecto creado correctamente');
        } else {
            return back()->withInput()->with('error', 'Rellena todos los campos.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_proyecto)
    {
        $project = Project::with('Task')->findOrFail($id_proyecto);
        $tareas = $project->Task;
        $tipostarea = Tipus::all();
        $estados = Status::all();
        $usuarios = Usuaris::all();

        return view('tasks.taskscreen', compact('project', 'tareas', 'tipostarea', 'estados', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_proyecto)
    {
        $project = Project::find($id_proyecto);

        if ($project->estado == 0) { 
            return redirect()->route('projects.index')->with('error', 'Este proyecto está desactivado');
        }

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_proyecto)
    {
        $project = Project::find($id_proyecto);
        
        if ($project->estado == 0) { 
            return redirect()->route('projects.index')->with('error', 'Este proyecto está desactivado');
        }

        if ($request->filled('nom')) {
            $project->nom = $request->input('nom');
        }
        if ($request->filled('descripcion')) {
            $project->descripcion = $request->input('descripcion');
        }
        $project->save();

        return back()->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_proyecto) {}

    public function deactivate(string $id_proyecto)
    {

        $project = Project::find($id_proyecto);
        $project->activo = 0;
        $project->save();

        return redirect()->route('projects.index');
    }
}
