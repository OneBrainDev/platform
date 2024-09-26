<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;

class SeederMakeModuleCommand extends SeederMakeCommand
{
    use OverrideMake;

    protected $name = 'module:seeder';

    protected function configNamespace()
    {
        return 'seeder';
    }
}
