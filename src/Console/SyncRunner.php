<?php

namespace Uspdev\Replicado2MongoDB\Console;

use Uspdev\Replicado2MongoDB\Contracts\SyncInterface;

class SyncRunner
{
    public function run()
    {
        $services = $this->discoverServices();

        foreach ($services as $service) {
            echo "Rodando: " . get_class($service) . PHP_EOL;
            $service->sync();
        }
    }

    private function discoverServices(): array
    {
        $services = [];

        foreach (glob(__DIR__ . '/../Services/*SyncService.php') as $file) {
            $class = $this->getClassFromFile($file);

            if (is_subclass_of($class, SyncInterface::class)) {
                $services[] = new $class;
            }
        }

        return $services;
    }

    private function getClassFromFile($file)
    {
        $base = basename($file, '.php');
        return "Uspdev\\Replicado2MongoDB\\Services\\$base";
    }
}