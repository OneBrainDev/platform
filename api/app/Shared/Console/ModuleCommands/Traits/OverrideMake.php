<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Traits;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait OverrideMake
{
    protected function configNamespace()
    {
        return '';
    }

    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['name', InputArgument::REQUIRED, 'The name of the '.strtolower($this->type)],
        ];
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . config('module-commands.namespaces.'.$this->configNamespace());
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $moduleFolder = strtolower($this->argument('module'));
        $srcPath = $this->getSrcPath($moduleFolder);

        if ($extension === '') {
            $name .= '.php';
        }

        return preg_replace("/\/{2,}/", '/', $srcPath.'/'.str_replace('\\', '/', $name));
    }

    protected function getSrcPath($moduleName)
    {
        $srcFolder = $this->useSrcPath()
            ? config('module-commands.srcFolderName')
            : "";

        return config('module-commands.moduleFolderName')."/$moduleName/$srcFolder";
    }
    protected function rootNamespace()
    {
        return config('module-commands.rootNamespace') . "\\".$this->argument('module');
    }

    protected function setConfigNamespace()
    {
        return config('module-commands.namespaces.'.$this->configNamespace());
    }

    protected function useSrcPath()
    {
        return true;
    }
}
