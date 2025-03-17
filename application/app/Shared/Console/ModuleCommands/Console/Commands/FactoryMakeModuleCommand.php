<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Console\Factories\FactoryMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class FactoryMakeModuleCommand extends FactoryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:factory';

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        return $this->replaceTokens($stub, [
            "namespace Database\Factories\\\\Database\Factories" => "namespace ".Config::string('modules.root_namespace')."\\".Str::ucfirst($this->argument('module')).Config::string('modules.namespaces.factory')
        ]);
    }

    protected function configNamespace(): string
    {
        return 'factory';
    }

    protected function useSrcPath(): bool
    {
        return false;
    }
}
