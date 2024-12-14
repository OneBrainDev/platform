<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMatchingTest;

final class ControllerMakeModuleCommand extends ControllerMakeCommand
{
    use OverrideMake;
    use OverrideMatchingTest;

    protected $name = 'module:controller';

    protected function configNamespace(): string
    {
        return 'controller';
    }
}
