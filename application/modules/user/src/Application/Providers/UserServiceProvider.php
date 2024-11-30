<?php declare(strict_types=1);

namespace Platform\User\Application\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../../user.routes.php');
    }

    public function register(): void
    { }
}
