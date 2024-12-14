<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\MailMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class MailMakeModuleCommand extends MailMakeCommand
{
    use OverrideMake;

    protected $name = 'module:mail';

    protected function configNamespace(): string
    {
        return 'mail';
    }
}
