<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputArgument;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\ServiceMakeCommand;

final class ServiceMakeModuleCommand extends ServiceMakeCommand
{
    use OverrideMake;

    protected $name = 'module:service';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $replace = [
            "Platform\\Contracts\\". Str::ucfirst($this->argument('model'))."Repository" =>
                 Config::string('modules.root_namespace')."\\".Str::ucfirst($this->argument('module')) . Config('modules.namespaces.repositories') . "\\" .$this->argument('model') . "Repository",
        ];

        return str_replace(array_keys($replace), array_values($replace), $stub);
    }

    protected function configNamespace(): string
    {
        return 'services';
    }

    /**
     * @return array<int, array<int, mixed>>
     */
    protected function getArguments()
    {
        $parent = parent::getArguments();

        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ...$parent,
        ];
    }
}
