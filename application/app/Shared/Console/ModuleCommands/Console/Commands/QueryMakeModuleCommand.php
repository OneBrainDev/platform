<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\QueryMakeCommand;

final class QueryMakeModuleCommand extends QueryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:query';

    protected function configNamespace(): string
    {
        return 'queries';
    }
}
