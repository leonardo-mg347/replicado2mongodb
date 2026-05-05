<?php

namespace Uspdev\Replicado2MongoDB\Database;

use MongoDB\Client;

class MongoConnection
{
    private static ?Client $client = null;

    public static function getClient(): Client
    {
        if (self::$client === null) {
            $host = env('REPLICADO2MONGODB_HOST', 'mongodb');
            $port = env('REPLICADO2MONGODB_PORT', 27017);
            $user = env('REPLICADO2MONGODB_DB', 'root');
            $pass = env('REPLICADO2MONGODB_PASS', 'replicado2mongodb');

            self::$client = new Client(
                "mongodb://$user:$pass@$host:$port"
            );
        }

        return self::$client;
    }

    public static function getCollection(string $collection)
    {
        return self::getClient()->replicado->$collection;
    }
}