#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use Uspdev\Replicado2MongoDB\Bootstrap;
use Uspdev\Replicado2MongoDB\Console\SyncRunner;

Bootstrap::init();

$runner = new SyncRunner();
$runner->run();