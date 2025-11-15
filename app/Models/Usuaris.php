<?php

namespace App\Models;

use App\Models\Usuaris;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuaris extends  Authenticatable
{
    use HasFactory,  Notifiable;
    protected $table = 'USUARIO';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['username', 'password', 'email'];


    public $timestamps = false;

    /**
     * Get all of the Task for the Usuaris
     *
     * @return HasMany
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
