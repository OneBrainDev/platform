<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\DataObjectMakeCommand;

final class DataObjectMakeModuleCommand extends DataObjectMakeCommand
{
    use OverrideMake;

    protected $name = 'module:data-object';

    protected function configNamespace(): string
    {
        return 'data_objects';
    }
}
