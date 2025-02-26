<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\Events\JobProcessing;

class TenantConnectionManager
{
    public function __construct() {}

    public function connect(string $connectionName): void
    {

        Queue::createPayloadUsing(fn () => ['tenant ' => $connectionName]);
        Event::listen(JobProcessing::class, function ($event): void {
            if (isset($event->job->payload()['tenant'])) {
                $this->connectionConfigure($event->job->payload()['tenant']);
            }
        });
    }

    public function connectionConfigure(string $name): void
    {
        config([
            'database.connections.tenant.database' => $name,
            'database.redis.default.database' => $name,
            'database.redis.cache.database' => $name.'_cache',
            'rebase.paths.db.tenant.name' => $name,
            'session.files' => storage_path('framework/sessions/'.$name),
            'cache.prefix' => $name,
            'filesystems.disks.local.root' => storage_path('app/'.$name),
            'filesystems.disks.spaces.bucket_path' => $name,
        ]);

        app('cache')->forgetDriver(Config::string('cache.default'));
    }


    public function disconnect(): void
    {
        DB::disconnect('tenant');
        DB::purge('tenant');
    }

    public function getCurrentConnection(): null|string
    {
        return Config::string('database.connections.tenant.database');
    }
}
