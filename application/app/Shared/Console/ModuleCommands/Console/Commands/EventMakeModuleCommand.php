<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\EventMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class EventMakeModuleCommand extends EventMakeCommand
{
    use OverrideMake;

    protected $name = 'module:event';

    protected function configNamespace(): string
    {
        return 'event';
    }
}
