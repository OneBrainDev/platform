<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ExceptionMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ExceptionMakeModuleCommand extends ExceptionMakeCommand
{
    use OverrideMake;

    protected $name = 'module:exception';

    protected function configNamespace(): string
    {
        return 'exception';
    }
}
