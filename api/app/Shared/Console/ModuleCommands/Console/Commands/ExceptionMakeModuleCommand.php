<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ExceptionMakeCommand;

class ExceptionMakeModuleCommand extends ExceptionMakeCommand
{
    use OverrideMake;

    protected $name = 'module:exception';

    protected function configNamespace()
    {
        return 'exception';
    }
}
