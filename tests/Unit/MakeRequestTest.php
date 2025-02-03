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

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Requests/TestRequest.php'));
    expect($actualContent)->toBe($expectedContent);
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

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Requests/TestRequest.php'));
    expect($actualContent)->toBe($expectedContent);
});
