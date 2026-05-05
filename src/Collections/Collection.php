<?php

namespace Uspdev\Replicado2MongoDB\Collections;

abstract class Collection
{
    protected function getQuery(string $filename, array $replaces = []): string
    {
        $queries = realpath(__DIR__ . '/../../resources/queries');

        $file = $queries . DIRECTORY_SEPARATOR . $filename;

        if (!file_exists($file)) {
            throw new \RuntimeException("Query file not found: {$file}");
        }

        $query = file_get_contents($file);

        foreach ($replaces as $key => $val) {
            if (str_starts_with($key, '--') || str_starts_with($key, '__')) {
                $query = str_replace($key, $val, $query);
            } else {
                $query = str_replace("__{$key}__", $val, $query);
            }
        }

        return $query;
    }
}