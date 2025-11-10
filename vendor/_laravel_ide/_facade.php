<?php

namespace Illuminate\Support\Facades;

interface Auth
{
    /**
     * @return \App\Models\Usuari|false
     */
    public static function loginUsingId(mixed $id, bool $remember = false);

    /**
     * @return \App\Models\Usuari|false
     */
    public static function onceUsingId(mixed $id);

    /**
     * @return \App\Models\Usuari|null
     */
    public static function getUser();

    /**
     * @return \App\Models\Usuari
     */
    public static function authenticate();

    /**
     * @return \App\Models\Usuari|null
     */
    public static function user();

    /**
     * @return \App\Models\Usuari|null
     */
    public static function logoutOtherDevices(string $password);

    /**
     * @return \App\Models\Usuari
     */
    public static function getLastAttempted();
}