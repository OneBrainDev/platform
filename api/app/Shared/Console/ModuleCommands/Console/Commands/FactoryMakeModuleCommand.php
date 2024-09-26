<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Database\Console\Factories\FactoryMakeCommand;

class FactoryMakeModuleCommand extends FactoryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:factory';

    protected function configNamespace()
    {
        return 'factory';
    }

    protected function useSrcPath()
    {
        return false;
    }

}
