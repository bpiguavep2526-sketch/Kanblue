<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    protected $table = 'usuarios';

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

    /**
     * The Projects that belong to the Usuaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'CREAR', 'id_usuario', 'id_proyecto')->withPivot('id_rol');
    }
}
