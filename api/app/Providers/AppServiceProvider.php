<?php declare(strict_types=1);

namespace Platform\Providers;

use Godruoyi\Snowflake\Snowflake;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Godruoyi\Snowflake\LaravelSequenceResolver;

class AppServiceProvider extends ServiceProvider
{
    /** @var string */
    private const SNOWFLAKE_BASE_TIMESTAMP = '1981-07-11';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('snowflake', function (Application $app) {
            return (new Snowflake())
                ->setStartTimeStamp(strtotime(self::SNOWFLAKE_BASE_TIMESTAMP) * 1000)
                ->setSequenceResolver(new LaravelSequenceResolver($app->get('cache.store')));
        });
    }
}
