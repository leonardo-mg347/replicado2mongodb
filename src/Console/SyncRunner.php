<?php

namespace Uspdev\Replicado2MongoDB\Console;

use Uspdev\Replicado2MongoDB\Contracts\CollectionInterface;

class SyncRunner
{
    public function run()
    {
        $collections = $this->discoverCollections();

        foreach ($collections as $collection) {
            echo "Rodando: " . get_class($collection) . PHP_EOL;
            $collection->sync();
        }
    }

    private function discoverCollections(): array
    {
        $collections = [];

        foreach (glob(__DIR__ . '/../Collections/*Collection.php') as $file) {
            $class = $this->getClassFromFile($file);

            if (is_subclass_of($class, CollectionInterface::class)) {
                $collections[] = new $class;
            }
        }

        return $collections;
    }

    private function getClassFromFile($file)
    {
        $base = basename($file, '.php');
        return "Uspdev\\Replicado2MongoDB\\Collections\\$base";
    }
}