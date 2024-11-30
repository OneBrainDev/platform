<?php declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Platform\Http\Middleware\HandleInertiaRequests;

$path = __DIR__.'/../modules';
$webRoutes = glob("$path/*/*.routes.php");
$apiRoutes = glob("$path/*/*.api.routes.php");

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            ...$webRoutes,
        ],
        api: [
            __DIR__.'/../routes/api.php',
            ...$apiRoutes,
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
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
