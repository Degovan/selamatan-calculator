<?php

namespace Selamatan\App\Controllers\Api;

use Selamatan\App\Exceptions\PageNotFoundException;
use Selamatan\App\Services\SelamatanService;
use Selamatan\App\Utils\Request;

class SelamatanController
{
    public function selamatan(Request $request)
    {
        if(!is_method('post')) throw new PageNotFoundException;

        $service = new SelamatanService($request->date);
        return json_encode($service->count());
    }
}
