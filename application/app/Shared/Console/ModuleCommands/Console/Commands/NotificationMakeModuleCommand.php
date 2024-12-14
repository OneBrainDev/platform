<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\NotificationMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class NotificationMakeModuleCommand extends NotificationMakeCommand
{
    use OverrideMake;

    protected $name = 'module:notification';

    protected function configNamespace(): string
    {
        return 'notification';
    }
}
