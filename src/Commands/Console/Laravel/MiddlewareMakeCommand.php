<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console\Laravel;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use \Illuminate\Routing\Console\MiddlewareMakeCommand as LaravelMiddlewareMakeCommand;

class MiddlewareMakeCommand extends LaravelMiddlewareMakeCommand
{

    use NamespaceHelper;

    protected $name = 'design:middleware';

    /**
     * @param $name
     *
     * @return string
     */
    protected function getNamespace($name): string
    {
        return self::checkNamespace($name);
    }

    /**
     * @param $name
     *
     * @return string
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $namespace = self::checkNamespaceForClassBuild($name);

        return parent::buildClass($namespace);
    }
}
