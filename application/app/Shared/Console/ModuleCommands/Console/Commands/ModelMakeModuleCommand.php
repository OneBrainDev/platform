<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMatchingTest;

final class ModelMakeModuleCommand extends ModelMakeCommand
{
    use OverrideMake;
    use OverrideMatchingTest;

    protected string $configName = 'models';

    protected $name = 'module:model';

    protected bool $useSrcFolder = true;

    protected function buildClass($name)
    {
        $ns = Config::string('modules.root_namespace')."\\".Str::ucfirst($this->argument('module'));

        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceTokens($stub, [
            "{{ factoryImport }}" => "use {$ns}". Config::string('modules.namespaces.factory')."\\".Str::ucfirst($this->argument('name'))."Factory;",
            "{{ collectionImport }}" =>  "use {$ns}".Config::string('modules.namespaces.collection')."\\".Str::ucfirst($this->argument('name'))."Collection;",
        ]);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('module:controller', array_filter([
            'module' => $this->argument('module'),
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') || $this->option('api') ? $modelName : null,
            '--api' => $this->option('api'),
            '--requests' => $this->option('requests') || $this->option('all'),
            '--test' => $this->option('test'),
            '--pest' => $this->option('pest'),
        ]));
    }

    protected function createFactory()
    {
        $factory = Str::studly($this->argument('name'));

        $this->call('module:factory', [
            'module' => $this->argument('module'),
            'name' => "{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('module:migration', [
            'module' => $this->argument('module'),
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    protected function createPolicy()
    {
        $policy = Str::studly(class_basename($this->argument('name')));

        $this->call('module:policy', [
            'module' => $this->argument('module'),
            'name' => "{$policy}Policy",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    protected function createSeeder()
    {
        $seeder = Str::studly(class_basename($this->argument('name')));

        $this->call('module:seeder', [
            'module' => $this->argument('module'),
            'name' => "{$seeder}Seeder",
        ]);
    }

    protected function getNameInput()
    {
        return Config::string('modules.namespaces.model') ."\\". $this->argument('name');
    }
}
