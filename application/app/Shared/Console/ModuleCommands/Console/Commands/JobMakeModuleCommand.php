<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\JobMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class JobMakeModuleCommand extends JobMakeCommand
{
    use OverrideMake;

    protected $name = 'module:job';

    protected function configNamespace(): string
    {
        return 'job';
    }
}
