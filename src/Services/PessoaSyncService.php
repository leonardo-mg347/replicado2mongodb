<?php

namespace Uspdev\Replicado2MongoDB\Services;

use Uspdev\Replicado2MongoDB\Models\Pessoa;
use Uspdev\Replicado2MongoDB\Contracts\SyncInterface;
use Illuminate\Database\Capsule\Manager as DB;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Client;

class PessoaSyncService implements SyncInterface
{
    public function sync(): void
    {

        die('rodei');
        // Pegar dados do replicado
        foreach ($replicado as $u) {
            $bulk[] = [
                'updateOne' => [
                    ['id_origem' => $u->id],
                    [
                        '$set' => [
                            'nome' => $u->nome,
                            'email' => $u->email,
                            'updated_at_sync' => $now
                        ]
                    ],
                    ['upsert' => true]
                ]
            ];
        }

        Pessoa::raw(function ($collection) use ($bulk) {
            $collection->bulkWrite($bulk);
        });

        // delete antigos
        Pessoa::where('updated_at_sync', '<', $now)->delete();
    }
}