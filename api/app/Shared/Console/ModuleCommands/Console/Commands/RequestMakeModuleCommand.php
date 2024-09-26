<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\RequestMakeCommand;

class RequestMakeModuleCommand extends RequestMakeCommand
{
    use OverrideMake;

    protected $name = 'module:request';

    protected function configNamespace()
    {
        return 'request';
    }
}
