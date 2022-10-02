<?php

namespace Selamatan\App;

use Selamatan\App\Exceptions\PageNotFoundException;

class Application
{
    protected string $method;
    protected string $controller;

    public static function register(array $routes)
    {
        $app = new self();
        $path = $_SERVER['PATH_INFO'] ?? '/';
        $route = in_array($path, array_keys($routes)) ? $routes[$path] : [];

        if(empty($route)) throw new PageNotFoundException;
        
        $app->controller = $route[0];
        $app->method = $route[1] ?? 'index';

        return $app;
    }

    public function run()
    {
        $controller = new $this->controller;
        $called = call_user_func([$controller, $this->method]);

        if(is_string($called)) echo $called;
    }
}
