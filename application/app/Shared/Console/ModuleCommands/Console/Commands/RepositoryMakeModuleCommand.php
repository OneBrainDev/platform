<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Platform\Shared\Console\MakeCommands\Console\RepositoryMakeCommand;

final class RepositoryMakeModuleCommand extends RepositoryMakeCommand
{
    use OverrideMake;

    protected $name = 'module:repository';

    protected function configNamespace(): string
    {
        return 'repositories';
    }
}
