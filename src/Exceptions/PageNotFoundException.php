<?php

namespace Selamatan\App\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
    public function __construct()
    {
        http_response_code(404);
        return view('404');
    }
}
