<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\NotificationMakeCommand;

class NotificationMakeModuleCommand extends NotificationMakeCommand
{
    use OverrideMake;

    protected $name = 'module:notification';

    protected function configNamespace()
    {
        return 'notification';
    }
}
