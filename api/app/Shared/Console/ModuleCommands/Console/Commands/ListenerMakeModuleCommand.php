<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ListenerMakeCommand;

class ListenerMakeModuleCommand extends ListenerMakeCommand
{
    use OverrideMake;

    protected $name = 'module:listener';

    protected function configNamespace()
    {
        return 'listener';
    }
}
