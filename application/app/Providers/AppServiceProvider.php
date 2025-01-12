<?php declare(strict_types=1);

namespace Platform\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::pattern('subdomain', "[0-9A-Za-z\-]+");

        $this->commands([
            \Platform\Shared\Console\MultiTenantCommands\Console\MultiTenantMigrateCommand::class,
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void {}
}
