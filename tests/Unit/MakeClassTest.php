<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('creates a new class correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestClass',
        'path' => '/Classes',
    ];

    //Act
    $this->artisan('make:class', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Classes')))->toBeTrue()
        ->and(File::exists(base_path('app/Classes/TestClass.php')))->toBeTrue();
});

it('creates a new class content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestClass',
        'path' => '/Classes',
    ];

    //Act
    $this->artisan('make:class', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Classes')))->toBeTrue()
        ->and(File::exists(base_path('app/Classes/TestClass.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Classes;

class TestClass
{

}

PHP;

    $actualContent = file_get_contents(base_path('app/Classes/TestClass.php'));
    expect($actualContent)->toBe($expectedContent);
});
