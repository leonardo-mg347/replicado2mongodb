<?php

namespace Uspdev\Replicado2MongoDB\Contracts;

interface CollectionInterface
{
    public function sync(): void;
}