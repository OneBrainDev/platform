<?php declare(strict_types=1);

namespace Platform\Shared\ConnectionManager;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\Events\JobProcessing;
use Platform\Shared\ConnectionManager\Traits\WorkspaceName;

class WorkspaceConnectionManager
{
    use WorkspaceName;

    public function __construct() {}

    public function connect(string $subdomain): void
    {
        $workspace = $this->getWorkspaceName($subdomain);

        Queue::createPayloadUsing(fn () => ['workspace_subdomain ' => $workspace]);
        Event::listen(JobProcessing::class, function ($event): void {
            if (isset($event->job->payload()['workspace_subdomain'])) {
                $this->connectionConfigure($event->job->payload()['workspace_subdomain']);
            }
        });
    }

    public function connectionConfigure(string $name): void
    {
        config([
            'database.connections.workspace.database' => $name,
            'database.redis.default.database' => $name,
            'database.redis.cache.database' => $name.'_cache',
            'rebase.paths.db.workspace.name' => $name,
            'session.files' => storage_path('framework/sessions/'.$name),
            'cache.prefix' => $name,
            'filesystems.disks.local.root' => storage_path('app/'.$name),
            'filesystems.disks.spaces.bucket_path' => $name,
        ]);

        app('cache')->forgetDriver(Config::string('cache.default'));
    }


    public function disconnect(): void
    {
        DB::disconnect('workspace');
        DB::purge('workspace');
    }

    public function getCurrentConnection(): null|string
    {
        return Config::string('database.connections.workspace.database');
    }

    public function isConnected(?string $name = null): bool
    {
        return  match ($name) {
            null => trim(Config::string('database.connections.workspace.database')) !== '',
            default => $this->getWorkspaceName($name) === Config::string('database.connections.workspace.database'),
        };
    }
}
