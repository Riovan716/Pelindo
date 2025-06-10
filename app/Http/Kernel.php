<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
  // ...

  protected $middlewareGroups = [
    'web' => [
      // middleware web lainnya
    ],
    'api' => [
      // middleware api lainnya
    ],
  ];

  protected $routeMiddleware = [
    // middleware default Laravel
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    // tambahkan ini:
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
  ];
}
