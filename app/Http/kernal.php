<?php

namespace App\Http;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Middleware\TrustHosts;
use Illuminate\Http\Middleware\TrustProxies;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
        TrustHosts::class,
        TrustProxies::class,
        HandleCors::class,
        \Illuminate\Http\Middleware\SetCacheHeaders::class,
        PreventRequestsDuringMaintenance::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        'manager.auth' => \App\Http\Middleware\CheckManagerAuth::class,
    ];
}
