<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Illuminate\Foundation\Console\ChannelMakeCommand;

class ChannelMakeModuleCommand extends ChannelMakeCommand
{
    use OverrideMake;

    protected $name = 'module:channel';

    protected function configNamespace()
    {
        return 'channel';
    }
}
