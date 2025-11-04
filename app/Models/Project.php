<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

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

}
