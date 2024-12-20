<?php declare(strict_types=1);

namespace Platform\Workspaces\Providers;

use Illuminate\Support\ServiceProvider;

class WorkspacesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../..//database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../workspaces.routes.php');
    }

    public function register(): void {}
}
