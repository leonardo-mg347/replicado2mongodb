<?php

namespace Uspdev\Replicado2MongoDB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pessoas';

    public $timestamps = false;

    protected $guarded = [];

    // Bloqueia escrita (read-only)
    public function save(array $options = [])
    {
        throw new \Exception("Read-only model");
    }

    // Bloqueia delete (read-only)
    public function delete()
    {
        throw new \Exception("Read-only model");
    }
}