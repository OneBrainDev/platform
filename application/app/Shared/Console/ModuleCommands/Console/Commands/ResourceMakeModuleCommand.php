<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ResourceMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ResourceMakeModuleCommand extends ResourceMakeCommand
{
    use OverrideMake;

    protected $name = 'module:resource';

    protected function configNamespace(): string
    {
        return 'resource';
    }
}
