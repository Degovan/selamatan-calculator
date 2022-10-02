<?php

namespace Selamatan\App\Utils;

use Latte\Engine;
use Latte\Loaders\FileLoader;

class View
{
    private static Engine|null $latte = null;

    public static function factory(): Engine
    {
        if(!(static::$latte instanceof Engine)) {
            $loader = new FileLoader(__DIR__ . '/../Views');
            $latte = new Engine();

            $latte->setLoader($loader);
            $latte->setTempDirectory(__DIR__ . '/../Views/_cache');
            static::$latte = $latte;

            return $latte;
        }

        return static::$latte;
    }
}
