<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Database\Console\Factories\FactoryMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class FactoryMakeModuleCommand extends FactoryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:factory';

    protected function configNamespace(): string
    {
        return 'factory';
    }

    protected function useSrcPath(): bool
    {
        return false;
    }
}
