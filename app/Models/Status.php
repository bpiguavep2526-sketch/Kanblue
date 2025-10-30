<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'ESTADO';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;

    /**
     * Get all of the Task for the Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Task(): HasMany
    {
        return $this->hasMany(Task::class, 'id_estado');
    }
}
