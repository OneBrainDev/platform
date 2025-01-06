<?php declare(strict_types=1);

namespace Platform\Workspaces\Providers;

use Illuminate\Support\ServiceProvider;

class WorkspacesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/workspaces/database/migrations'));
        $this->loadRoutesFrom(base_path('modules/workspaces/routes/web.php'));
        $this->mergeConfigFrom(
            base_path('modules/workspaces/config/workspaces.php'),
            'workspaces'
        );
    }

    public function register(): void {}
}
