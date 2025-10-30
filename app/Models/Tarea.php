<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    protected $table = 'tareas';
    // protected $primarykey = 'id';
    // protected $incrementing = 'false';
    protected $timestamps = 'false';

    /**
     * Get thn proyectos that owns the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyectos(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'id_proyectos');
    }

    /**
     * Get the user that owns the Tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
}
