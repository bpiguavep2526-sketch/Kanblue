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
     * Muestra un listado de los proyectos activos asociados al usuario actual.
     *
     * @return \Illuminate\View\View Vista con los proyectos y datos del usuario.
     */
    public function index()
    {
        $usuario = session('usuario');
        $projects = Project::select('PROYECTOS.*')
            ->leftJoin('TAREAS', 'PROYECTOS.id_proyecto', '=', 'TAREAS.id_proyecto')
            ->leftJoin('CREAR', 'PROYECTOS.id_proyecto', '=', 'CREAR.id_proyecto')
            ->where('PROYECTOS.activo', 1)
            ->where('TAREAS.id_usuario', $usuario->id_usuario)
            ->orWhere('CREAR.id_usuario', $usuario->id_usuario)
            ->where('PROYECTOS.activo', 1)
            ->distinct()
            ->get();

        $ownProyects = Project::select('PROYECTOS.*')
            ->leftJoin('CREAR', 'PROYECTOS.id_proyecto', '=', 'CREAR.id_proyecto')
            ->where('PROYECTOS.activo', 1)
            ->where('CREAR.id_usuario', $usuario->id_usuario)
            ->distinct()
            ->get();

        $ids_myProjects = [];

        foreach ($ownProyects as $ownProject) {
            $ids_myProjects[] = $ownProject->id_proyecto;
        }

        return view('projects.index', compact('projects', 'ids_myProjects', 'usuario'));
    }

     /**
     * Muestra el formulario para crear un nuevo proyecto.
     *
     * @param string $id_usuario  ID del usuario que creará el proyecto.
     * @return \Illuminate\View\View Vista de edición/creación del proyecto.
     */
    public function create(string $id_usuario)
    {
        $project = null;
        $usuario = Usuaris::find($id_usuario);

        return view('projects.edit', compact('project', 'usuario'));
    }

        /**
     * Almacena un nuevo proyecto en la base de datos.
     *
     * @param \Illuminate\Http\Request $request  Datos del proyecto (nom, descripcion).
     * @param string $id_usuario  ID del usuario que crea el proyecto.
     * @return \Illuminate\Http\RedirectResponse Redirige atrás con mensaje de éxito o error y reinicia el formulario.
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
     * Muestra el proyecto seleccionado, cargando sus tareas.
     * @param int $id_proyecto  ID del proyecto.
     * @return \Illuminate\View\View Vista con el proyecto y sus tareas.
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
     * Muestra el formulario para editar un proyecto existente.
     *
     * @param string $id_proyecto  ID del proyecto.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse  Vista de edición o redirección con error si está desactivado.
     */
    public function edit(string $id_proyecto)
    {
        $project = Project::find($id_proyecto);

        if ($project->activo == 0) { 
            return redirect()->route('projects.index')->with('error', 'Este proyecto está desactivado');
        }

        return view('projects.edit', compact('project'));
    }

    /**
     * Actualiza los datos de un proyecto existente.
     *
     * @param \Illuminate\Http\Request $request  Datos actualizados del proyecto.
     * @param string $id_proyecto  ID del proyecto a actualizar.
     * @return \Illuminate\Http\RedirectResponse Redirige atrás con mensaje de éxito o error.
     */
    public function update(Request $request, string $id_proyecto)
    {
        $project = Project::find($id_proyecto);
        
        if ($project->activo == 0) { 
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
     * Desactiva un proyecto estableciendo su campo 'activo' a 0.
     *
     * @param string $id_proyecto  ID del proyecto a desactivar.
     * @return \Illuminate\Http\RedirectResponse Redirige al listado de proyectos.
     */
    public function deactivate(string $id_proyecto)
    {

        $project = Project::find($id_proyecto);
        $project->activo = 0;
        $project->save();

        return redirect()->route('projects.index');
    }
}
