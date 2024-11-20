<?php

use GianluApi\LaravelDesign\Test\TestCase;
use Illuminate\Support\Facades\File;

uses(TestCase::class)
    ->beforeEach(function () {
        if (File::exists(base_path('app'))) {
            File::deleteDirectory(base_path('app'));
        }

        if (File::exists(resource_path())) {
            File::deleteDirectory(resource_path());
        }
    })
    ->afterEach(function () {
        if (File::exists(base_path('app'))) {
            File::deleteDirectory(base_path('app'));
        }

        if (File::exists(resource_path())) {
            File::deleteDirectory(resource_path());
        }

    })
    ->in('Unit', 'Feature', 'Architecture');
