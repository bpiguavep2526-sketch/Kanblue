<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipus extends Model
{
    protected $table = 'TIPUS';
    protected $primaryKey = 'id_tipus';
    public $timestamps = false;

    /**
     * Get all of the Task for the Tipus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Task(): HasMany
    {
        return $this->hasMany(Task::class, 'id_tipus');
    }
}
