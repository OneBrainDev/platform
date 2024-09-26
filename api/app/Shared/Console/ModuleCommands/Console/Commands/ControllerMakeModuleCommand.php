<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMatchingTest;

class ControllerMakeModuleCommand extends ControllerMakeCommand
{
    use OverrideMake;
    use OverrideMatchingTest;

    protected $name = 'module:controller';

    protected function configNamespace()
    {
        return 'controller';
    }
}
