<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('creates a new react component correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestReact',
        'path' => 'js/Pages',
    ];

    //Act
    $this->artisan('make:react', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestReact.jsx')))->toBeTrue();
});

it('creates a new react component content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestReact',
        'path' => 'js/Pages',
    ];

    //Act
    $this->artisan('make:react', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestReact.jsx')))->toBeTrue();

    $expectedContent = <<<'PHP'
import React from 'react';

const TestReact = () => {
    return (
        <div>

        </div>
    );
};

export default TestReact;
PHP;

    $actualContent = file_get_contents(resource_path('js/Pages/TestReact.jsx'));
    expect($actualContent)->toBe($expectedContent);
});
