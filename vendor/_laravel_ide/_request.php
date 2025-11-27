<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\Usuaris|null
     */
    public function user($guard = null);
}