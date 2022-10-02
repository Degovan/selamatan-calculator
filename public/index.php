<?php

use Selamatan\App\Application;

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../config/routes.php';
$app = Application::register($routes);

$app->run();
