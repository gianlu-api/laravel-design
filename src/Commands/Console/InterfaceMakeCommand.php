<?php declare(strict_types=1);

namespace gianluApi\laravelDesign\Commands\Console;

use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;

class InterfaceMakeCommand extends GeneratorCommand
{

    protected $signature = 'make:interface {name} {namespace}';

    protected $description = 'Create new interface';

    protected $type = 'Interface';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Interface.stub';
    }

    /**
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $namespace = $this->argument('namespace');

        if (!is_string($namespace)) {
            throw new InvalidArgumentException("namespace must be a string");
        }

        return $rootNamespace . $namespace;
    }
}
