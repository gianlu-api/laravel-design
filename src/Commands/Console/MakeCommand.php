<?php

declare(strict_types=1);

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\PathHelper;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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

        $namespace = self::checkPath($this->argument('path'), false);

        return $rootNamespace . $namespace;
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        if ($this->option('strict_types')) {
            $stub = str_replace('{{ strict_types }}', 'declare(strict_types=1);', $stub);
        } else {
            $stub = str_replace('{{ strict_types }}', '', $stub);
        }

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

}
