<?php declare(strict_types=1);

namespace Platform\Clinics\Providers;

use Illuminate\Support\ServiceProvider;

class ClinicsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/clinics/database/migrations'));
        $this->loadRoutesFrom(base_path('modules/clinics/routes/web.php'));
        $this->mergeConfigFrom(
            base_path('modules/clinics/config/clinics.php'),
            'clinics'
        );
    }

    public function register(): void {}
}
