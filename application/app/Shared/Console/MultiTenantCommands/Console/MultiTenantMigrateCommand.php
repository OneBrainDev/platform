<?php declare(strict_types=1);

namespace Platform\Shared\Console\MultiTenantCommands\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Platform\Shared\Helpers\ModuleHelper;
use Platform\workspaces\Domain\Models\Workspace;
use Platform\Shared\ConnectionManager\WorkspaceManager;
use Platform\Shared\ConnectionManager\WorkspaceConnectionManager;

final class MultiTenantMigrateCommand extends Command
{
    protected $signature = 'multi:migrate
        {module? : run migrations from a single module}
        {workspace? : run migrations for a single workspace}
        {--workspaces : run migrations for all the workspaces}
        {--modules : run migrations from all modules}
        {--all : run all migrations eveywhere on all workspaces}
        {--all-shared : run all shared migrations across modules}
        {--all-workspaces : run all workspace migrations across modules}
        {--seed : run seeders}';

    private WorkspaceConnectionManager $connection;
    private ModuleHelper $helper;
    private WorkspaceManager $manager;

    /**  @var array<int, string> */
    private array $modules;

    /**  @var array<int, string> */
    private array $workspaces;

    /**
     * Migrate Shared Central -- multi:migrate
     * Migrate Shared Workspace -- multi:migrate --workspaces|{workspace}
     *
     * Migrate Module Central -- multi:migrate --module|{module}
     * Migrate Module Workspace -- multi:migrate --module|{module} --workspaces|{workspace}
     *
     * Migrate Everything -- multi:migrate --all
     * Migrate Shared and Module Central -- multi:migrate --all-shared
     * Migrate Shared and Module Workspace -- multi:migrate --all-workspaces
     */
    public function handle(): void
    {
        $this->manager = new WorkspaceManager();
        $this->helper = new ModuleHelper();
        $this->connection = new WorkspaceConnectionManager();

        $this->modules = $this->argument('module')
        ? [$this->argument('module')]
        : $this->helper->getModuleNames();

        $this->workspaces = $this->argument('workspace')
        ? [$this->manager->getWorkspaceName($this->argument('workspace'))]
        : [];

        $this->workspaces = $this->option('workspaces')
        ? $this->manager->getWorkspaces() ?? []
        : array_merge($this->workspaces, []);

        match (true) {
            $this->option('all') => $this->migrateEverything(),
            $this->option('all-shared') => $this->migrateAllShared(),
            $this->option('all-workspaces') => $this->migrateAllWorkspaces(),
            ! $this->hasWorkspace() && ! $this->hasModule() => $this->migrateSharedCentralTables(),
            ! $this->hasWorkspace() && $this->hasModule() => $this->migrateModuleCentralTables(),
            $this->hasWorkspace() && ! $this->hasModule() => $this->migrateSharedWorkspaceTables(),
            $this->hasWorkspace() && $this->hasModule() => $this->migrateModuleWorkspaceTables(),
            default => throw new \Exception('Unable to run multi migrate command')
        };
    }

    private function hasModule(): bool
    {
        return $this->option('modules') || $this->argument('module');
    }

    private function hasWorkspace(): bool
    {
        return $this->option('workspaces') || $this->argument('workspace');
    }

    private function migrateAllShared(): void
    {
        $this->migrateSharedCentralTables();
        $this->migrateModuleCentralTables();

    }

    private function migrateAllWorkspaces(): void
    {
        $this->migrateSharedWorkspaceTables();
        $this->migrateModuleWorkspaceTables();
    }

    private function migrateEverything(): void
    {
        $this->migrateAllShared();
        $this->migrateAllWorkspaces();
    }


    private function migrateModuleCentralTables(): void
    {
        collect($this->modules)->each(function ($module) {
            $this->migration(
                args: [
                    '--database' => Config::string('database.connections.metadata.central.connection'),
                    '--path' => sprintf(Config::string('database.connections.metadata.central.module_migration_path'), $module),
                ],
                message: "Migrate $module in Central Database",
            );
        });
    }

    private function migrateModuleWorkspaceTables(): void
    {
        collect($this->modules)->each(function ($module) {
            collect($this->workspaces)->each(function ($workspace) use ($module) {
                $this->connection->connect($workspace);
                $this->migration(
                    args: [
                        '--database' => Config::string('database.connections.metadata.workspace.connection'),
                        '--path' => sprintf(Config::string('database.connections.metadata.workspace.module_migration_path'), $module),
                    ],
                    message: "Migrate $module in Workspace $workspace Database"
                );
                $this->connection->disconnect();
            });
        });
    }

    private function migrateSharedCentralTables(): void
    {
        $this->migration(
            args:[
                '--database' => Config::string('database.connections.metadata.central.connection'),
                '--path' => Config::string('database.connections.metadata.central.migration_path'),
            ],
            message: "Migrate Shared in Cental Database"
        );
    }

    private function migrateSharedWorkspaceTables(): void
    {
        collect($this->modules)->each(function (string $module) {
            collect($this->workspaces)->each(function (string $workspace) use ($module) {
                $this->connection->connect($workspace);
                $this->migration(
                    args: [
                        '--database' => Config::string('database.connections.metadata.central.connection'),
                        '--path' => sprintf(Config::string('database.connections.metadata.central.module_migration_path'), $module),
                    ],
                    message: "Migrate Shared $module in Workspace $workspace Database"
                );
                $this->connection->disconnect();
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
        ], $args);

        if ($message) {
            $this->info($message);
        }

        $this->call('migrate', $arguments);
    }
}
