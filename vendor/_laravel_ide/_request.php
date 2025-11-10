<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\Usuari|null
     */
    public function user($guard = null);
}