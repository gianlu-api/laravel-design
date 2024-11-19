<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use InvalidArgumentException;

class ReactMakeCommand extends GeneratorCommand
{

    protected $signature = 'make:react {name} {namespace?}';
    protected $description = 'Create new react file';
    protected $type = 'React';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/React.stub';
    }

    /**
     * @param $name
     *
     * @return string
     */
    protected function getPath($name): string
    {
        $path = $this->argument('namespace') ?? resource_path('js/Pages');

        if ( !is_string($path) ) {
            throw new InvalidArgumentException("namespace must be a string");
        }

        $name = $this->argument('name');

        if ( !is_string($name) ) {
            throw new InvalidArgumentException("name must be a string");
        }

        return resource_path("$path/$name.jsx");
    }

    /**
     * @param $name
     *
     * @return string
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        $name = $this->argument('name');

        if ( !is_string($name) ) {
            throw new InvalidArgumentException("name must be a string");
        }

        return str_replace('{{ name }}', $name, $stub);
    }

}
