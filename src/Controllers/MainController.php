<?php

namespace Selamatan\App\Controllers;

use Selamatan\App\Utils\Request;

class MainController
{
    public function index(Request $request)
    {
        return view('complete.html', [], false);
    }

    public function latte(Request $request)
    {
        return view('home');
    }
}
