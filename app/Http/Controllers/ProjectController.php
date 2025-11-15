<?php

namespace App\Http\Controllers;

use App\Models\Tipus;
use App\Models\Status;
use App\Models\Project;
use App\Models\Usuaris;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = session('usuario');
        $projects = Project::select('PROYECTOS.*')->join('TAREAS', 'PROYECTOS.id_proyecto', '=', 'TAREAS.id_proyecto')->where('TAREAS.id_usuario', $usuario->id_usuario)->distinct()->get();

        return view('projects.index', compact('projects', 'usuario'));
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
    public function show($id_proyecto)
    {
        $project = Project::with('Task')->findOrFail($id_proyecto);
        $tareas = $project->Task;
        $tipostarea = Tipus::all();
        $estados = Status::all();
        $usuarios = Usuaris::all();

        return view('tasks.taskscreen', compact('project', 'tareas','tipostarea' ,'estados', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
