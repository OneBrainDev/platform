<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class RequestMakeModuleCommand extends RequestMakeCommand
{
    use OverrideMake;

    protected $name = 'module:request';

    protected function configNamespace(): string
    {
        return 'request';
    }
}
