<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputArgument;

trait OverrideMake
{
    protected function configNamespace(): string
    {
        return '';
    }

    /**
     * @return array<int, array<int, mixed>>
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['name', InputArgument::REQUIRED, 'The name of the '.strtolower($this->type)],
        ];
    }

    /**
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $this->configNamespace() !== ''
            ? Config::string('modules.namespaces.'.$this->configNamespace())
            : '';

        return $rootNamespace.$namespace;
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $namespaces = explode('\\', $this->rootNamespace());
        foreach ($namespaces as $namespace) {
            $name = Str::replaceFirst($namespace . '\\', '', $name);
        }

        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $moduleFolder = strtolower($this->argument('module'));
        $srcPath = $this->getSrcPath($moduleFolder);

        if ($extension === '') {
            $name .= '.php';
        }

        return preg_replace("/\/{2,}/", '/', $srcPath.'/'.str_replace('\\', '/', $name)) ?? '';
    }

    /**
     * @param  string  $moduleName
     * @return string
     */
    protected function getSrcPath($moduleName)
    {
        $srcFolder = $this->useSrcPath()
            ? '/'.Config::string('modules.src_folder')
            : '';

        return Config::string('modules.module_folder')."/{$moduleName}{$srcFolder}";
    }

    /**
     * @return string
     */
    protected function rootNamespace()
    {
        return Config::string('modules.root_namespace').'\\'.Str::ucfirst($this->argument('module'));
    }

    /**
     * @return string
     */
    protected function setConfigNamespace()
    {
        return Config::string('modules.namespaces.'.$this->configNamespace());
    }

    protected function useSrcPath(): bool
    {
        return true;
    }
}
