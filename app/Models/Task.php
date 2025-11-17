<?php

namespace App\Models;

use App\Models\Tipus;
use App\Models\Status;
use App\Models\Project;
use App\Models\Usuaris;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $table = 'TAREAS';
    protected $primaryKey = 'id_tarea';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'descripcion',
        'id_estado', 
        'id_proyectos', // Asegúrate de que este campo esté aquí si lo vas a guardar
        'id_tipus',
        'id_usuario',
    ];

    /**
     * Get the Project that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_proyecto');
    }

    /**
     * Get the Tipus that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Tipus(): BelongsTo
    {
        return $this->belongsTo(Tipus::class, 'id_tipus');
    }

    /**
     * Get the Usuaris that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Usuaris(): BelongsTo
    {
        return $this->belongsTo(Usuaris::class, 'id_usuario');
    }

    /**
     * Get the Status that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_estado');
    }
}

