<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\RuleMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class RuleMakeModuleCommand extends RuleMakeCommand
{
    use OverrideMake;

    protected $name = 'module:rule';

    protected function configNamespace(): string
    {
        return 'rule';
    }
}
