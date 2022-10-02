<?php

namespace Selamatan\App\Controllers;

use Selamatan\App\Utils\Request;

class MainController
{
    public function index(Request $request)
    {
        return 'Hello World';
    }
}
