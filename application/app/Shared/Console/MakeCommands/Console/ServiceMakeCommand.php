<?php declare(strict_types=1);

namespace Platform\Shared\Console\MakeCommands\Console;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make:service')]
class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service file';
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';


    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $replace = [
            "{{ model }}" => Str::ucfirst($this->argument('model')),
            "{{ modelNamespace }}" => "Platform\\Contracts\\". Str::ucfirst($this->argument('model'))."Repository",
        ];

        return str_replace(array_keys($replace), array_values($replace), $stub);
    }

    /**
     * Get the console command arguments.
     *
     * @return array<int, array<int, int|string>>
     */
    protected function getArguments()
    {
        $parentArgs = parent::getArguments();

        $args = [
            ...$parentArgs,
            ['model', InputArgument::REQUIRED, 'The name of the model'],
        ];

        return $args;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    /**
     * Get the console command options.
     *
     * @return array<int, array<int, int|string>>
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the service already exists'],
        ];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->laravel->basePath('stubs/service.stub');
    }
}
