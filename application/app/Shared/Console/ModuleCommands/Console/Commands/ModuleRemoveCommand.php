<?php

declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Composer\Factory;
use Composer\Json\JsonFile;
use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

final class ModuleRemoveCommand extends GeneratorCommand
{
    protected $name = 'module:remove';

    private string $module;

    public function handle()
    {
        $this->module = strtolower($this->argument('name'));

        if ($this->confirm("This will remove {$this->module} files and entries from composer, are you sure?")) {
            $this->files->deleteDirectory(config('module-commands.moduleFolderName').'/'.$this->module);
            $this->updateMainComposer();
        }

        return true;
    }

    protected function getStub(): string
    {
        return '';
    }

    private function updateMainComposer(): void
    {
        chdir($this->laravel->basePath());
        $json_file = new JsonFile(Factory::getComposerFile());
        $definition = $json_file->read();

        $composerName = Str::lower(config('module-commands.rootNamespace')).'/'.$this->module;

        unset($definition['require']["{$composerName}"]);

        $json_file->write($definition);
    }
}
