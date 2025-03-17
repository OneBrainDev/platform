<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Console\Migrations\BaseCommand;

final class MigrationMakeModuleCommand extends BaseCommand
{
    protected $signature = 'module:migration {module : The name of the module} {name : The name of the migration}
        {--tenant : Will add to the tenant migration folder}
        {--create= : The table to be created}
        {--table= : The table to migrate}';

    public function handle(): void
    {
        $path = $this->option('tenant')
            ? sprintf(Config::string('database.connections.metadata.tenant.module_migration_path'), $this->argument('module'))
            : sprintf(Config::string('database.connections.metadata.primary.module_migration_path'), $this->argument('module'));

        $this->call('make:migration', [
            'name' => $this->argument('name'),
            '--table' => $this->option('table'),
            '--path' => $path,
        ]);
    }
}
