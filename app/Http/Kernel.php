<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $routeMiddleware = [
        // thêm middleware custom của bạn
        'adminRole' => \App\Http\Middleware\CheckAdminRole::class,
    ];
}
