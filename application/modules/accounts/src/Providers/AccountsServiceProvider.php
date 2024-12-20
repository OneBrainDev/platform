<?php declare(strict_types=1);

namespace Platform\Accounts\Providers;

use Illuminate\Support\ServiceProvider;

class AccountsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../..//database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../accounts.routes.php');
    }

    public function register(): void {}
}
