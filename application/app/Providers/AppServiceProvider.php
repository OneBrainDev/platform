<?php declare(strict_types=1);

namespace Platform\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Platform\Shared\Console\MakeCommands\Console\QueryMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\ActionMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\ServiceMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\CollectionMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\DataObjectMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\RepositoryMakeCommand;
use Platform\Shared\Console\MakeCommands\Console\ValueObjectMakeCommand;
use Platform\Shared\Console\PlatformCommands\Console\GenerateEnvCommand;
use Platform\Shared\Console\PlatformTenantCommands\Console\PlatformTenantMigrateCommand;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::pattern('subdomain', "[0-9A-Za-z\-]+");

        $this->commands([
            ActionMakeCommand::class,
            CollectionMakeCommand::class,
            DataObjectMakeCommand::class,
            GenerateEnvCommand::class,
            PlatformTenantMigrateCommand::class,
            QueryMakeCommand::class,
            RepositoryMakeCommand::class,
            ServiceMakeCommand::class,
            ValueObjectMakeCommand::class,
        ]);

        if ($this->app->environment('local')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void {}
}
