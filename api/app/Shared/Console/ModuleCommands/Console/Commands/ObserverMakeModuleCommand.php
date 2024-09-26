<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ObserverMakeCommand;

class ObserverMakeModuleCommand extends ObserverMakeCommand
{
    use OverrideMake;

    protected $name = 'module:observer';

    protected function configNamespace()
    {
        return 'observer';
    }
}
