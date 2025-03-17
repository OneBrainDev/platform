<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\CollectionMakeCommand;

final class CollectionMakeModuleCommand extends CollectionMakeCommand
{
    use OverrideMake;

    protected $name = 'module:collection';

    protected function configNamespace(): string
    {
        return 'collection';
    }
}
