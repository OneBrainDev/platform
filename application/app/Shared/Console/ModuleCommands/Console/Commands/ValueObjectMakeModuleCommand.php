<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\ValueObjectMakeCommand;

final class ValueObjectMakeModuleCommand extends ValueObjectMakeCommand
{
    use OverrideMake;

    protected $name = 'module:value-object';

    protected function configNamespace(): string
    {
        return 'value_objects';
    }
}
