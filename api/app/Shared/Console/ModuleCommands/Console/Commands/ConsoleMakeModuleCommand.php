<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ConsoleMakeCommand;

class ConsoleMakeModuleCommand extends ConsoleMakeCommand
{
    use OverrideMake;

    protected $name = 'module:command';

    protected function configNamespace()
    {
        return 'command';
    }
}
