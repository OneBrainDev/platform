<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\ActionMakeCommand;

final class ActionMakeModuleCommand extends ActionMakeCommand
{
    use OverrideMake;

    protected $name = 'module:action';

    protected function configNamespace(): string
    {
        return 'actions';
    }
}
