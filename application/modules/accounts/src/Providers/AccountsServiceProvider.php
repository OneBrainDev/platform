<?php declare(strict_types=1);

namespace Platform\Accounts\Providers;

use Illuminate\Support\ServiceProvider;

class AccountsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/accounts/database/migrations'));
        $this->loadRoutesFrom(base_path('modules/accounts/routes/web.php'));
        $this->mergeConfigFrom(
            base_path('modules/accounts/config/accounts.php'),
            'accounts'
        );
    }

    public function register(): void {}
}
