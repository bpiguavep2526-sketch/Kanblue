<?php

namespace App\Models;

use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyectos extends Model
{
    protected $table = 'proyectos';
    protected $primarykey = 'id_proyectos';
    // protected $incrementing = 'false';
    protected $timestamps = 'false';

    /**
     * Get all of the comments for the Proyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_proyectos');
    }

    /**
     * The roles that belong to the Proyectos
     *
     * @return BelongsToMany
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class,'id_proyerctos', 'id_usuarios');
    }
}
