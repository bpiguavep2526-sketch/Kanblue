<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primarykey = 'id_usuario';
    // protected $incrementing = 'false';
    protected $timestamps = 'false';

    /**
     * Get all of the comments for the Usuario
     *
     * @return HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_usuario');
    }

    /**
     * The roles that belong to the Usuario
     *
     * @return BelongsToMany
     */
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class, 'id_usuario', 'id_proyecto');
    }
}
