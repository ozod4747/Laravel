<?php

namespace App\Http\Controllers\Post;

use App\Services\Post\Service;

class BaseController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
