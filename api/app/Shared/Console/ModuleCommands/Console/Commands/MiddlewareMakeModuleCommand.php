<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Routing\Console\MiddlewareMakeCommand;

class MiddlewareMakeModuleCommand extends MiddlewareMakeCommand
{
    use OverrideMake;

    protected $name = 'module:middleware';

    protected function configNamespace()
    {
        return 'middleware';
    }
}
