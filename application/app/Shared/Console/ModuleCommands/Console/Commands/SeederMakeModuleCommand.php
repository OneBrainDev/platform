<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class SeederMakeModuleCommand extends SeederMakeCommand
{
    use OverrideMake;

    protected $name = 'module:seeder';

    protected function configNamespace(): string
    {
        return 'seeder';
    }

    protected function useSrcPath(): bool
    {
        return false;
    }
}
