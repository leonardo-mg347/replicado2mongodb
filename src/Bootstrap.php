<?php

namespace Uspdev\Replicado2MongoDB;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Bootstrap
{
    public static function init()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $config = require __DIR__ . '/../config/database.php';

        $capsule = new Capsule;

        $capsule->addConnection($config['mongodb'], 'mongodb');

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}