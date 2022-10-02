<?php

if(!function_exists('config')) {
    function config(string $name) {
        $names = explode('.', $name);
        $config = require __DIR__ . "/../config/{$names[0]}.php";

        return $config[$names[1]];
    }
}

if(!function_exists('view')) {
    function view(string $name) {
        return require __DIR__ . "/Views/{$name}.php";
    }
}
