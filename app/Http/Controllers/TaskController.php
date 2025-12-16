<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\Tipus;
use App\Models\Usuaris;
use App\Classes\TaskClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Carga la vista Kanban con las tareas y sus detalles.
     *
     * @return \Illuminate\View\View Vista con las tareas, usuarios y tipos de tarea existentes.
     */
    public function index()
    {
        $tareas = Task::all();
        $usuarios = Usuaris::all();
        $tipostarea = Tipus::all();

        return view('tasks.taskscreen', compact('tareas', 'usuarios', 'tipostarea'));
    }

     /**
     * Muestra el formulario para crear una nueva tarea.
     *
     * @param string $id_proyecto  ID del proyecto al que se asignará la tarea.
     * @return \Illuminate\View\View Vista del formulario de creación de tarea.
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
     * Almacena una nueva tarea en la base de datos.
     *
     * @param \Illuminate\Http\Request $request  Datos de la tarea.
     * @param string $id_proyecto  ID del proyecto al que pertenece la tarea.
     * @return \Illuminate\Http\RedirectResponse Redirige atrás con mensaje de éxito o error.
     */
    public function store(Request $request, string $id_proyecto)
    {
        $task = new Task;
        if (! $request->filled('titulo')) {
            return back()->withInput()->with('error', 'Rellena todos los campos.');
        } elseif (! $request->filled('descripcion')) {
            return back()->withInput()->with('error', 'Rellena todos los campos.');
        } else {
            $task->titulo = $request->input('titulo');
            $task->descripcion = $request->input('descripcion');
            $estado = Status::where('ESTADO.nom', $request->input('estado'))->first();
            $user = Usuaris::where('USUARIO.username', $request->input('usuario'))->first();
            $tipus = Tipus::where('TIPUS.nom', $request->input('tipo'))->first();
            $project = Project::find($id_proyecto);
            $task->id_estado = $estado->id_estado;
            $task->id_proyecto = $project->id_proyecto;
            $task->id_tipus = $tipus->id_tipus;
            $task->id_usuario = $user->id_usuario;
            $task->activo = 1;
            $task->save();

            return back()->with('success', 'Tarea creada correctamente');
        }
    }

    /**
     * Muestra el formulario para editar una tarea existente, y carga sus datos.
     *
     * @param string $id_tarea  ID de la tarea a editar.
     * @return \Illuminate\View\View Vista del formulario de edición de tarea.
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
     * Actualiza los datos de una tarea existente.
     *
     * @param \Illuminate\Http\Request $request  Datos actualizados de la tarea.
     * @param string $id  ID de la tarea a actualizar.
     * @return \Illuminate\Http\RedirectResponse Redirige atrás con mensaje de éxito.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        if ($request->input('titulo') != null) {
            $task->titulo = $request->input('titulo');
        }
        if ($request->input('descripcion') != null) {
            $task->descripcion = $request->input('descripcion');
        }
        $estado = Status::where('ESTADO.nom', $request->input('estado'))->first();
        $user = Usuaris::where('USUARIO.username', $request->input('usuario'))->first();
        $tipus = Tipus::where('TIPUS.nom', $request->input('tipo'))->first();
        $task->id_estado = $estado->id_estado;
        $task->id_tipus = $tipus->id_tipus;
        $task->id_usuario = $user->id_usuario;
        $task->save();
        return back()->with('success', 'Tarea actualizada correctamente');
    }

     /**
     * Desactiva una tarea estableciendo su campo 'activo' a 0.
     *
     * @param string $id_tarea  ID de la tarea a desactivar.
     * @return \Illuminate\Http\RedirectResponse Redirige a la vista del proyecto correspondiente.
     */
    public function deactivate(string $id_tarea)
    {

        $tarea = Task::find($id_tarea);
        $tarea->activo = 0;
        $tarea->save();

        return redirect()->route('projects.show', $tarea->id_proyecto);
    }

 /**
     * Actualiza el estado de una tarea específica tras su arrastre en la tabla Kanban.
     *
     * @param string $taskId  ID de la tarea.
     * @param string $status  Nombre del nuevo estado.
     */    
    public function updateStatus(string $taskId, string $status)
    {

        $taskId = (int) $taskId; 
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
    }

    /**
     * Muestra gráficos relacionados con las tareas de un proyecto.
     *
     * @param string $id_proyecto  ID del proyecto.
     * @return \Illuminate\View\View Vista con gráficos de tareas por usuario.
     */
    public function showCharts(string $id_proyecto)
    {
        $taskList = Task::select('TAREAS.*')
            ->where('TAREAS.id_proyecto', $id_proyecto)
            ->get();

        $userList = Usuaris::select('USUARIO.*')
            ->leftJoin('TAREAS', 'TAREAS.id_usuario', '=', 'USUARIO.id_usuario')
            ->where('TAREAS.id_proyecto', $id_proyecto)
            ->distinct()
            ->get();

        return view('tasks.charts', compact('taskList', 'userList'));
    }
}
