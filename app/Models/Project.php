<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyectos';
    public $timestamps = false;

    /**
     * Get all of the Task for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Task(): HasMany
    {
        return $this->hasMany(Task::class, 'id_proyectos');
    }

    /**
     * The roles that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuaris::class, 'CREAR', 'id_proyecto', 'id_usuario')->whitPivot('id_rol');
    }

}
