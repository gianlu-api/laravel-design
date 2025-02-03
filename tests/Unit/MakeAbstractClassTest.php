<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new abstract class correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestAbstractClass',
        'path' => '/AbstractClasses',
    ];

    //Act
    $this->artisan('design:class:abstract', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/AbstractClasses')))->toBeTrue()
        ->and(File::exists(base_path('app/AbstractClasses/TestAbstractClass.php')))->toBeTrue();
});

it('creates a new abstract class without leading slash correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestAbstractClass',
        'path' => 'AbstractClasses',
    ];

    //Act
    $this->artisan('design:class:abstract', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/AbstractClasses')))->toBeTrue()
        ->and(File::exists(base_path('app/AbstractClasses/TestAbstractClass.php')))->toBeTrue();
});

it('creates a new abstract class content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestAbstractClass',
        'path' => '/AbstractClasses',
    ];

    //Act
    $this->artisan('design:class:abstract', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/AbstractClasses')))->toBeTrue()
        ->and(File::exists(base_path('app/AbstractClasses/TestAbstractClass.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\AbstractClasses;

abstract class TestAbstractClass
{

}

PHP;

    $actualContent = file_get_contents(base_path('app/AbstractClasses/TestAbstractClass.php'));
    expect($actualContent)->toBe($expectedContent);
});
