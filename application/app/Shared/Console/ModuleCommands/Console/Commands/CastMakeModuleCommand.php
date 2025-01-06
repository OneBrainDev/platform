<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\CastMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class CastMakeModuleCommand extends CastMakeCommand
{
    use OverrideMake;

    protected $name = 'module:cast';

    protected function configNamespace(): string
    {
        return 'casts';
    }
}
