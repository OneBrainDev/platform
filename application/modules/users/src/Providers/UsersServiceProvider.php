<?php declare(strict_types=1);

namespace Platform\Users\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/users/database/migrations'));
        $this->loadRoutesFrom(base_path('modules/users/routes/web.php'));
        $this->mergeConfigFrom(
            base_path('modules/users/config/users.php'),
            'users'
        );
    }

    public function register(): void {}
}
