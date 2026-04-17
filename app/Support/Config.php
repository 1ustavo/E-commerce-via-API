<?php
declare(strict_types=1);

namespace App\Support;

final class Config
{
    public static function load(string $file): array
    {
        $path = dirname(__DIR__, 2) . '/config/' . $file . '.php';
        if (!is_file($path)) {
            return [];
        }

        $loaded = require $path;
        return is_array($loaded) ? $loaded : [];
    }
}

