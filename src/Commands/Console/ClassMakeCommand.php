<?php declare( strict_types=1 );

namespace gianluApi\laravelDesign\Commands\Console;

use gianluApi\laravelDesign\Helpers\NamespaceHelper;

class ClassMakeCommand extends MakeCommand
{

    use NamespaceHelper;

    protected $signature = 'make:class {name} {namespace}';
    protected $description = 'Create new class';
    protected $type = 'Class';

    protected function getStub(): string
    {
        return __DIR__ . '/../../../stubs/Class.stub';
    }

}
