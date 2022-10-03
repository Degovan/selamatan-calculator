<?php

namespace Selamatan\App\Utils;

class Config
{
    private static array $config = [];

    public static function load(string $name): array
    {
        if(!array_key_exists($name, static::$config)) {
            $config = require __DIR__ . "/../../config/{$name}.php";
            static::$config[$name] = $config;

            return $config;
        }

        return static::$config[$name];
    }
}
