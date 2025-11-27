<?php

namespace Illuminate\Contracts\Auth;

interface Guard
{
    /**
     * @return \App\Models\Usuaris|null
     */
    public function user();
}