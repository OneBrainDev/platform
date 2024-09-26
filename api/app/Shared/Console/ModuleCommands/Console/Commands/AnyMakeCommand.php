<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;

class AnyMakeCommand extends GeneratorCommand
{
    use OverrideMake;

    protected $hidden = true;

    protected $name = "make:any";

    protected $type = "file";

    public function getArguments()
    {
        return array_merge(parent::getArguments(), [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['stub', InputArgument::REQUIRED, 'stub to replace'],
            ['namespace', InputArgument::OPTIONAL, 'namespace', ''],
            ['tokens', InputArgument::OPTIONAL, 'tokens', []],
        ]);
    }

    public function getStub()
    {
        $stub = $this->argument('stub');
        $customPath = base_path(trim($stub, '/'));

        return file_exists($customPath)
            ? $customPath
            : __DIR__."/../../../../../../stubs/".$stub;
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceTokens($stub, $this->argument('tokens'));

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['src', null, InputOption::VALUE_NEGATABLE, 'To src or not to src'],
        ]);
    }

    protected function replaceTokens(string $stub, array $tokens)
    {
        foreach ($tokens as $find => $replace) {
            $stub = str_replace($find, $replace, $stub);
        }

        return $stub;
    }

    protected function useSrcPath()
    {
        return $this->option('src');
    }
}
