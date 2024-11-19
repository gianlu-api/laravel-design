<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;

class AbstractClassMakeCommand extends GeneratorCommand
{

    protected $signature = 'make:class:abstract {name} {namespace}';
    protected $description = 'Create new abstract class';
    protected $type = 'Abstract Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/AbstractClass.stub';
    }

    /**
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $namespace = $this->argument('namespace');

        if ( !is_string($namespace) ) {
            throw new InvalidArgumentException("namespace must be a string");
        }

        return $rootNamespace . $namespace;
    }

}
