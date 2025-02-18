<?php declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Platform\Http\Middleware\HandleInertiaRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            ...glob(__DIR__.'/../modules/*/*.routes.php'),
        ],
        api: [
            __DIR__.'/../routes/api.php',
            ...glob(__DIR__.'/../modules/*/*.api.routes.php'),
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustHosts(at: ['platform.test']);

        $middleware->api(prepend: []);

        $middleware->web(append: [HandleInertiaRequests::class]);

        $middleware->alias([
            // 'verified' => \Platform\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
