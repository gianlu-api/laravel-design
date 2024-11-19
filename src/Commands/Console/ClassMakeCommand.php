<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;

class ClassMakeCommand extends GeneratorCommand
{

    protected $signature = 'make:class {name} {namespace}';
    protected $description = 'Create new class';
    protected $type = 'Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Class.stub';
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
