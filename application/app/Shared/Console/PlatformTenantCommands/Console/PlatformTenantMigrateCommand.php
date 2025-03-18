<?php declare(strict_types=1);

namespace Platform\Shared\Console\PlatformTenantCommands\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Platform\Shared\Helpers\ModuleHelper;
use Platform\Shared\ConnectionManager\TenantConnectionManager;

final class PlatformTenantMigrateCommand extends Command
{
    protected $signature = 'platform:migrate
        {tenant? : run migrations for a single tenant}
        {--tenants : run migrations for all the tenants}
        {--primary : run all shared migrations across modules}
        {--all : run all migrations eveywhere on all }
        {--seed : run seeders}';

    /**
     * @var array<int, string>
     */
    private array $modules = [];
    private TenantConnectionManager $tenantConnection;

    public function handle(): void
    {
        $this->modules = (new ModuleHelper())->getModuleNames();
        $this->tenantConnection = new TenantConnectionManager();

        if ($this->option('primary') || $this->option('all')) {
            $this->migratePrimaryDatabase();
        }

        if ($this->option('tenants') || $this->option('all')) {
            $this->migrateTenantsDatabase();
        }

        if ($this->argument('tenant')) {
            $this->migrateTenantsDatabase($this->argument('tenant'));
        }
    }

    private function migratePrimaryDatabase(): void
    {
        collect($this->modules)->each(function ($module) {
            $this->migration(
                args: [
                    '--database' => config()->string('database.connections.metadata.primary.connection_name'),
                    '--path' => sprintf(Config::string('database.connections.metadata.primary.module_migration_path'), $module),
                ],
                message: "Migrate $module in Primary Database",
            );
        });
    }

    private function migrateTenant(string $tenant, string $module): void
    {
        $this->tenantConnection->connect($tenant);
        $this->migration(
            args: [
                '--database' => Config::string('database.connections.metadata.tenant.connection_name'),
                '--path' => sprintf(Config::string('database.connections.metadata.tenant.module_migration_path'), $module),
            ],
            message: "Migrate $module in Workspace $tenant Database"
        );
        $this->tenantConnection->disconnect();
    }

    private function migrateTenantsDatabase(?string $tenant = null): void
    {
        $tenants = $tenant
            ? [$tenant]
            : DB::select("SHOW DATABASES LIKE 'tenant_%s'");

        collect($this->modules)->each(function ($module) use ($tenants) {
            collect($tenants)->each(function ($tenant) use ($module) {
                $this->migrateTenant($tenant, $module);
            });
        });
    }

    /**
     * @param array<string, string> $args
     */
    private function migration(array $args, ?string $message = null): void
    {
        $arguments =  array_merge([
            '--step' => true,
            '--force' => true,
            '--no-interaction' => true,
            '--seed' => $this->option('seed') ? true : false,
        ], $args);

        if ($message) {
            $this->info($message);
        }

        $this->call('migrate', $arguments);
    }
}
