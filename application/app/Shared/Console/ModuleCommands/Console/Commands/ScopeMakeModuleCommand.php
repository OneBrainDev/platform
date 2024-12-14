<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ScopeMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ScopeMakeModuleCommand extends ScopeMakeCommand
{
    use OverrideMake;

    protected $name = 'module:scope';

    protected function configNamespace(): string
    {
        return 'scope';
    }
}
