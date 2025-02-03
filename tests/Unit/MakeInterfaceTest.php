<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new interface correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestInterface',
        'path' => '/Interfaces',
    ];

    //Act
    $this->artisan('design:interface', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Interfaces')))->toBeTrue()
        ->and(File::exists(base_path('app/Interfaces/TestInterface.php')))->toBeTrue();
});

it('creates a new interface content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestInterface',
        'path' => '/Interfaces',
    ];

    //Act
    $this->artisan('design:interface', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Interfaces')))->toBeTrue()
        ->and(File::exists(base_path('app/Interfaces/TestInterface.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Interfaces;

interface TestInterface
{

}

PHP;

    $actualContent = file_get_contents(base_path('app/Interfaces/TestInterface.php'));
    expect($actualContent)->toBe($expectedContent);
});
