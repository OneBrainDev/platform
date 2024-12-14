<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ConsoleMakeModuleCommand extends ConsoleMakeCommand
{
    use OverrideMake;

    protected $name = 'module:command';

    protected function configNamespace(): string
    {
        return 'command';
    }
}
