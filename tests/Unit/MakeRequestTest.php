<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new Request correctly', function () {
    //Arrange
    $config = [
        "name" => "TestRequest"
    ];

    //Act
    $this->artisan('design:request', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Requests/TestRequest.php')))->toBeTrue();
});

it('creates a new Request content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestRequest"
    ];

    //Act
    $this->artisan('design:request', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Requests/TestRequest.php')))->toBeTrue();

    $content = file_get_contents(base_path('app/Http/Requests/TestRequest.php'));

    expect($content)
        ->toContain('namespace App\Http\Requests')
        ->toContain('class TestRequest extends FormRequest')
        ->toContain('public function authorize(): bool')
        ->toContain('public function rules(): array');
});

it('creates a new Request with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Requests/TestRequest"
    ];

    //Act
    $this->artisan('design:request', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Requests/TestRequest.php')))->toBeTrue();
});

it('creates a new Request with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Requests/TestRequest"
    ];

    //Act
    $this->artisan('design:request', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Requests/TestRequest.php')))->toBeTrue();

    $content = file_get_contents(base_path('app/Http/Test/Requests/TestRequest.php'));

    expect($content)
        ->toContain('namespace App\Http\Test\Requests')
        ->toContain('class TestRequest extends FormRequest')
        ->toContain('public function authorize(): bool')
        ->toContain('public function rules(): array');
});
