<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;
use Illuminate\Console\GeneratorCommand;

class MakeCommand extends GeneratorCommand
{

    use NamespaceHelper;

    protected function getStub()
    {

    }

    /**
     * @param string $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $namespace = self::checkNamespace($this->argument('namespace'));

        return $rootNamespace . $namespace;
    }

}
