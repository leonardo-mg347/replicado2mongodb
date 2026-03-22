<?php

return [
    'mongodb' => [
        'driver'   => 'mongodb',
        'host'     => getenv('REPLICADO2MONGODB_HOST'),
        'port'     => getenv('REPLICADO2MONGODB_PORT'),
        'database' => getenv('REPLICADO2MONGODB_DB'),
        'username' => getenv('REPLICADO2MONGODB_USER'),
        'password' => getenv('REPLICADO2MONGODB_PASS'),
    ],
];