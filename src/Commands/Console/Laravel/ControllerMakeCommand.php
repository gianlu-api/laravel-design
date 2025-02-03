<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console\Laravel;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;
use Illuminate\Routing\Console\ControllerMakeCommand as LaravelControllerMakeCommand;

class ControllerMakeCommand extends LaravelControllerMakeCommand
{

    use NamespaceHelper;

    protected $name = 'design:controller';

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
     */
    protected function buildClass($name): string
    {
        $namespace = self::checkNamespaceForClassBuild($name);

        $replace = [];

        if ($this->option('parent')) {
            $replace = $this->buildParentReplacements();
        }

        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        if ($this->option('creatable')) {
            $replace['abort(404);'] = '//';
        }

        $baseControllerExists = file_exists($this->getPath($namespace));

        if ($baseControllerExists) {
            $replace["use {$namespace}\Controller;\n"] = '';
        } else {
            $replace[' extends Controller'] = '';
            $replace["use App\Http\Controllers\Controller;\n"] = '';
        }

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($namespace)
        );
    }

}
