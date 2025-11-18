<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    public $timestamps = false;

    /**
     * Get all of the Task for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Task(): HasMany
    {
        return $this->hasMany(Task::class, 'id_proyecto');
    }

    /**
     * The roles that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuaris::class, 'CREAR', 'id_proyecto', 'id_usuario');
    }

}
