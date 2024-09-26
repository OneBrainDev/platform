<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

class PolicyMakeModuleCommand extends PolicyMakeCommand
{
    use OverrideMake;

    protected $name = 'module:policy';

    protected function configNamespace()
    {
        return 'policy';
    }
}
