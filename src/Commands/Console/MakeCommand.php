<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\PathHelper;
use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;

class MakeCommand extends GeneratorCommand
{

    use PathHelper;

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Class.stub';
    }

    /**
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        if (!is_string($this->argument('path'))) {
            throw new InvalidArgumentException("path must be a string");
        }

        $namespace = self::checkPath($this->argument('path'));

        return $rootNamespace . $namespace;
    }

}
