<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ObserverMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ObserverMakeModuleCommand extends ObserverMakeCommand
{
    use OverrideMake;

    protected $name = 'module:observer';

    protected function configNamespace(): string
    {
        return 'observer';
    }
}
