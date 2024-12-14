<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Foundation\Console\TestMakeCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

final class TestMakeModuleCommand extends TestMakeCommand
{
    use OverrideMake;

    protected $name = 'module:test';

    protected function configNamespace(): string
    {
        if ($this->option('unit')) {
            return 'test_unit';
        }

        return 'test_feature';
    }

    protected function useSrcPath(): bool
    {
        return false;
    }
}
