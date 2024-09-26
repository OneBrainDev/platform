<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ResourceMakeCommand;

class ResourceMakeModuleCommand extends ResourceMakeCommand
{
    use OverrideMake;

    protected $name = 'module:resource';

    protected function configNamespace()
    {
        return 'resource';
    }
}
