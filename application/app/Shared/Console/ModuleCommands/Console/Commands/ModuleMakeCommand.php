<?php

declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Console\GeneratorCommand;

final class ModuleMakeCommand extends GeneratorCommand
{
    protected $name = 'make:module';

    private string $module;

    public function handle()
    {
        $this->module = strtolower($this->argument('name'));
        $structure = Config::array('modules.structure');
        $path = Config::string('modules.module_folder').'/'.$this->module;

        $this->line('Writing folder structure: '.$path);
        $this->buildStructure($structure, $path);

        $this->line('Writing routes file ');
        $this->buildRoutes($path);

        $this->line('Writing config file ');
        $this->buildConfig();

        $this->line('Writing composer file ');
        $this->buildComposer();

        $this->line('Writing Model file ');
        $this->call('module:model', [
            'name' => Str::ucfirst(Str::singular($this->argument('name'))),
            'module' => $this->module,
            '--factory' => true,
            '--seed' => true,
        ]);

        $this->line('Writing Repository file ');
        $this->call('module:repository', [
            'name' => Str::ucfirst(Str::singular($this->argument('name')))."Repository",
            'module' => $this->module,
        ]);

        $this->line('Writing Collection file ');
        $this->call('module:collection', [
            'name' => Str::ucfirst(Str::singular($this->argument('name')))."Collection",
            'module' => $this->module,
        ]);

        $this->line('Writing module service provider ');
        $this->buildServiceProvider();

        $this->line('Updating the main composer.json ');
        $this->updateMainComposer();

        $this->line('Done.');
        $this->info('you should now run composer update');

        return null;
    }

    protected function getStub(): string
    {
        return '';
    }

    private function buildComposer(): void
    {
        $this->call('make:any', [
            'name' => 'composer.json',
            'stub' => 'module.composer.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{namespace}}' => strtolower(Config::string('modules.root_namespace')),
                '{{module}}' => $this->module,
                '{{ModuleRootNamespace}}' => Config::string('modules.root_namespace'),
                '{{ServiceProviderNamespace}}' => Str::replace('\\', '\\\\', Config::string('modules.namespaces.provider')),
                '{{ModuleName}}' => Str::ucfirst($this->argument('name')),
                '{{TestName}}' => '',
                '{{src}}' => '',
            ],
        ]);
    }

    private function buildConfig(): void
    {
        $this->call('make:any', [
            'name' => "config/{$this->module}.php",
            'stub' => 'module.config.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{module}}' => $this->argument('name'),
            ],
        ]);
    }

    private function buildRoutes(string $path): void
    {
        $this->call('make:any', [
            'name' => 'routes/web.php',
            'stub' => 'module.routes.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{module}}' => $this->module,
            ],
        ]);

    }

    private function buildServiceProvider(): void
    {
        $providerName = Str::ucfirst($this->argument('name')).'ServiceProvider';
        $moduleName = Str::ucfirst($this->module);
        $singularModuleName = Str::singular($moduleName);

        $this->call('make:any', [
            'name' => Config::string('modules.namespaces.provider').'\\'.$providerName,
            'stub' => 'module.serviceprovider.stub',
            'module' => $this->module,
            '--src' => true,
            'tokens' => [
                '{{namespace}}' => Config::string('modules.root_namespace').'\\'.Str::ucfirst($this->argument('name')).Config::string('modules.namespaces.provider'),
                '{{class}}' => $providerName,
                '{{moduleName}}' => $this->module,
                '{{model}}' => $singularModuleName,
                '{{repositoryName}}' => $singularModuleName."Repository",
                '{{seederName}}' => $singularModuleName."Seeder",
                '{{importModel}}' => Config::string('modules.root_namespace').'\\'.Str::ucfirst($this->argument('name')) . Config::string('modules.namespaces.model').'\\'.$singularModuleName,
                '{{importRepository}}' => Config::string('modules.root_namespace').'\\'.Str::ucfirst($this->argument('name')) . Config::string('modules.namespaces.repositories').'\\'.$singularModuleName."Repository",
                '{{importSeeder}}' =>  Config::string('modules.root_namespace').'\\'.Str::ucfirst($this->argument('name')) . Config::string('modules.namespaces.seeder') .'\\'.$singularModuleName."Seeder",
                '{{migrationPath}}' => Str::replace('\\', '/', Config::string('modules.namespaces.migration')),
                '{{routePath}}' => Str::replace('\\', '/', Config::string('modules.namespaces.route')),
                '{{configPath}}' => Str::replace('\\', '/', Config::string('modules.namespaces.config')),
            ],
        ]);
    }

    /**
     * @param  array<int|string, mixed>  $structure
     */
    private function buildStructure(array $structure, string $path): mixed
    {
        return collect($structure)->each(function ($v, $k) use ($path): string|Collection {
            $k = str_replace('{{src}}', Config::string('modules.src_folder'), (string) $k);
            $path .= "/$k";
            if (is_array($v) && count($v) > 0) {
                return $this->buildStructure($v, $path);
            }

            $this->files->makeDirectory(path: $path, recursive: true);

            return $path;
        });
    }

    private function updateMainComposer(): void
    {
        chdir($this->laravel->basePath());
        $json_file = new JsonFile(Factory::getComposerFile());
        $definition = $json_file->read();

        $composerName = Str::lower(Config::string('modules.root_namespace')).'/'.$this->module;
        $definition['require']["{$composerName}"] = '*';
        $json_file->write($definition);
    }
}
