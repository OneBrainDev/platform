<?php declare(strict_types=1);

namespace Platform\Users\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Application;
use Platform\Users\Domain\Models\User;
use Illuminate\Support\ServiceProvider;
use Platform\Shared\Abstractions\Repository;
use Platform\Users\Contracts\UserRepository;
use Platform\Users\Database\Seeders\UserSeeder;
use Illuminate\Contracts\Support\DeferrableProvider;

class UsersServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/users/database/migrations'));
        $this->loadRoutesFrom(base_path('modules/users/routes/web.php'));
        $this->loadTranslationsFrom(base_path('modules/users/resources/lang'));
        $this->loadJsonTranslationsFrom(base_path('modules/users/resources/lang'));

        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) {
            $seeder->call([UserSeeder::class]);
        });

        $this->mergeConfigFrom(
            base_path('modules/users/config/users.php'),
            'users'
        );

        $this->app->singleton(UserRepository::class, function (Application $app) {
            return new Repository(app(User::class));
        });
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [UserRepository::class];
    }

    public function register(): void {}
}
