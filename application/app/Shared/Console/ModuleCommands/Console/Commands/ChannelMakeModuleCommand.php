<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\ChannelMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class ChannelMakeModuleCommand extends ChannelMakeCommand
{
    use OverrideMake;

    protected $name = 'module:channel';

    protected function configNamespace(): string
    {
        return 'channel';
    }
}
