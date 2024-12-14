<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ListenerMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ListenerMakeModuleCommand extends ListenerMakeCommand
{
    use OverrideMake;

    protected $name = 'module:listener';

    protected function configNamespace(): string
    {
        return 'listener';
    }
}
