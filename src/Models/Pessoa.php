<?php

namespace Uspdev\Replicado2MongoDB\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pessoas';

    public $timestamps = false;

    protected $guarded = [];
}