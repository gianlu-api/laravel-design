<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new Resource correctly', function () {
    //Arrange
    $config = [
        "name" => "TestResource"
    ];

    //Act
    $this->artisan('make:resource', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Resources/TestResource.php')))->toBeTrue();
});

it('creates a new Resource content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestResource"
    ];

    //Act
    $this->artisan('make:resource', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Resources/TestResource.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Resources/TestResource.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a new Resource with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Resources/TestResource"
    ];

    //Act
    $this->artisan('make:resource', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Resources/TestResource.php')))->toBeTrue();
});

it('creates a new Resource with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Resources/TestResource"
    ];

    //Act
    $this->artisan('make:resource', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Resources/TestResource.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Resources/TestResource.php'));
    expect($actualContent)->toBe($expectedContent);
});

