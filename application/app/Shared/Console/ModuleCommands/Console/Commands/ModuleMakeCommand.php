<?php

declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Console\GeneratorCommand;

final class ModuleMakeCommand extends GeneratorCommand
{
    protected $name = 'make:module';

    private string $module;

    public function handle()
    {
        $this->module = strtolower($this->argument('name'));
        $structure = config('module-commands.structure');
        $path = config('module-commands.moduleFolderName').'/'.$this->module;

        $this->line('Writing folder structure: '.$path);
        $this->buildStructure($structure, $path);

        $this->line('Writing routes file ');
        $this->buildRoutes($path);

        $this->line('Writing config file ');
        $this->buildConfig();

        $this->line('Writing composer file ');
        $this->buildComposer();

        $this->line('Writing module service provider ');
        $this->buildServiceProvider();

        $this->line('Updating the main composer.json ');
        $this->updateMainComposer();
        $this->line('Done.');
        $this->info('you should now run composer update');

        return true;
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
                '{{namespace}}' => strtolower(config('module-commands.rootNamespace')),
                '{{module}}' => $this->module,
                '{{ModuleRootNamespace}}' => config('module-commands.rootNamespace'),
                '{{ServiceProviderNamespace}}' => Str::replace('\\', '\\\\', (string) config('module-commands.namespaces.provider')),
                '{{ModuleName}}' => Str::ucfirst($this->argument('name')),
                '{{TestName}}' => '',
                '{{src}}' => '',
            ],
        ]);
    }

    private function buildConfig(): void
    {
        $this->call('make:any', [
            'name' => 'config.php',
            'stub' => 'module.config.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{module}}' => $this->argument('name'),
            ],
        ]);

        $path = config('module-commands.moduleFolderName').'/'.$this->module;

        $this->files->move("$path/config.php", "$path/$this->module.config.php");
    }

    private function buildRoutes(string $path): void
    {
        $this->call('make:any', [
            'name' => 'routes.php',
            'stub' => 'module.routes.stub',
            'module' => $this->module,
            '--src' => false,
            'tokens' => [
                '{{module}}' => $this->module,
            ],
        ]);

        $this->files->move("$path/routes.php", "$path/$this->module.routes.php");
    }

    private function buildServiceProvider(): void
    {
        $providerName = Str::ucfirst($this->argument('name')).'ServiceProvider';

        $this->call('make:any', [
            'name' => config('module-commands.namespaces.provider').'\\'.$providerName,
            'stub' => 'module.serviceprovider.stub',
            'module' => $this->module,
            '--src' => true,
            'tokens' => [
                '{{namespace}}' => config('module-commands.rootNamespace').'\\'.Str::ucfirst($this->argument('name')).config('module-commands.namespaces.provider'),
                '{{class}}' => $providerName,
                '{{moduleName}}' => $this->module,
                '{{migrationPath}}' => Str::replace('\\', '/', (string) config('module-commands.namespaces.migration')),
                '{{routePath}}' => Str::replace('\\', '/', (string) config('module-commands.namespaces.route')),
                '{{configPath}}' => Str::replace('\\', '/', (string) config('module-commands.namespaces.config')),
            ],
        ]);
    }

    /**
     * @param  array<int|string, mixed>  $structure
     */
    private function buildStructure(array $structure, string $path): mixed
    {
        return collect($structure)->each(function ($v, $k) use ($path): string|Collection {
            $k = str_replace('{{src}}', (string) config('module-commands.srcFolderName'), (string) $k);
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

        $module_config = [
            'type' => 'path',
            'url' => strtolower(config('module-commands.module_namespace').'/*'),
            'options' => [
                'symlink' => true,
            ],
        ];

        $composerName = Str::lower(config('module-commands.rootNamespace')).'/'.$this->module;
        $definition['require']["{$composerName}"] = '*';
        $json_file->write($definition);
    }
}
