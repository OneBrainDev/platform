<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class MiddlewareMakeModuleCommand extends MiddlewareMakeCommand
{
    use OverrideMake;

    protected $name = 'module:middleware';

    protected function configNamespace(): string
    {
        return 'middleware';
    }
}
