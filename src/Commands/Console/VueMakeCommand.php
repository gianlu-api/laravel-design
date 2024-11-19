<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use InvalidArgumentException;

class VueMakeCommand extends GeneratorCommand
{

    protected $signature = 'make:vue {name} {namespace?} {--type=composition}';
    protected $description = 'Create new vue file';
    protected $type = 'Vue';

    protected function getStub(): string
    {
        $type = $this->option('type');

        if ( $type === 'options' ) {
            return __DIR__ . '/../../../stubs/VueOptionsApi.stub';
        }

        return __DIR__ . '/../../../stubs/VueCompositionApi.stub';
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

        return resource_path("$path/$name.vue");
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
