<?php declare(strict_types=1);

namespace Platform\Shared\Console\ModuleCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Platform\Shared\Console\ModuleCommands\Traits\OverrideMake;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class AnyMakeCommand extends GeneratorCommand
{
    use OverrideMake;

    protected $hidden = true;

    protected $name = 'make:any';

    protected $type = 'file';

    /**
     * @return array<int, mixed>
     */
    public function getArguments(): array
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
            : __DIR__.'/../../../../../../stubs/'.$stub;
    }

    protected function buildClass($name)
    {

        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceTokens($stub, (array) $this->argument('tokens'));

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * @return array<int, mixed>
     */
    protected function getOptions(): array
    {
        return array_merge(parent::getOptions(), [
            ['src', null, InputOption::VALUE_NEGATABLE, 'To src or not to src'],
        ]);
    }

    /**
     * @param  array<string|int, string>  $tokens
     */
    protected function replaceTokens(string $stub, array $tokens): string
    {
        foreach ($tokens as $find => $replace) {
            $stub = str_replace((string) $find, $replace, $stub);
        }

        return $stub;
    }

    protected function useSrcPath(): bool
    {
        return (bool) $this->option('src');
    }
}
