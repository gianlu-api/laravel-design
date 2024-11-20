<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;
use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;

class MakeCommand extends GeneratorCommand
{

    use NamespaceHelper;

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Class.stub';
    }

    /**
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        if (!is_string($this->argument('namespace'))) {
            throw new InvalidArgumentException("namespace must be a string");
        }

        $namespace = self::checkNamespace($this->argument('namespace'));

        return $rootNamespace . $namespace;
    }

}
