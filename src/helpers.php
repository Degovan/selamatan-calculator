<?php

use Selamatan\App\Utils\Config;
use Selamatan\App\Utils\View;

if(!function_exists('config')) {
    function config(string $name) {
        $names = explode('.', $name);
        $config = Config::load($names[0]);

        return $config[$names[1]];
    }
}

if(!function_exists('view')) {
    function view(string $name, object|array $params = []) {
        View::factory()->render("{$name}.latte", $params);
    }
}
