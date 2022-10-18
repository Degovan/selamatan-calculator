<?php

use Selamatan\App\Controllers\Api\SelamatanController;
use Selamatan\App\Controllers\MainController;

/**
 * List of all application routes
 * 
 * <path> => [<controller>, <method>]
 */
return [
    '/'  => [MainController::class, 'index'],
    '/latte' => [MainController::class, 'latte'],
    '/api/selamatan' => [SelamatanController::class, 'selamatan'],
];
