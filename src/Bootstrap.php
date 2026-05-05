<?php

namespace Uspdev\Replicado2MongoDB;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
use Uspdev\Replicado\Replicado;

class Bootstrap
{
    public static function init()
    {
        // Vamos usar createUnsafeImmutable ao invés createImmutable para ativar o getenv que é usado em uspdev/replicado
        $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
        $dotenv->load();
    }
}