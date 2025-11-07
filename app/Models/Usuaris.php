<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuaris;

class Usuaris extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    /**
     * Get all of the Task for the Usuaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Task(): HasMany
    {
        return $this->hasMany(Task::class, 'id_usuario');
    }
}
