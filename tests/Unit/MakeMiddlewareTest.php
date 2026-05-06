<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new Middleware correctly', function () {
    //Arrange
    $config = [
        "name" => "TestMiddleware"
    ];

    //Act
    $this->artisan('design:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Middleware')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Middleware/TestMiddleware.php')))->toBeTrue();
});

it('creates a new Middleware content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestMiddleware"
    ];

    //Act
    $this->artisan('design:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Middleware')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Middleware/TestMiddleware.php')))->toBeTrue();

    $content = file_get_contents(base_path('app/Http/Middleware/TestMiddleware.php'));

    expect($content)
        ->toContain('namespace App\Http\Middleware')
        ->toContain('class TestMiddleware')
        ->toContain('public function handle(Request $request, Closure $next): Response');
});

it('creates a new Middleware with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Middlewares/TestMiddleware"
    ];

    //Act
    $this->artisan('design:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Middlewares')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Middlewares/TestMiddleware.php')))->toBeTrue();
});

it('creates a new Middleware with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Middlewares/TestMiddleware"
    ];

    //Act
    $this->artisan('design:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Middlewares')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Middlewares/TestMiddleware.php')))->toBeTrue();

    $content = file_get_contents(base_path('app/Http/Test/Middlewares/TestMiddleware.php'));

    expect($content)
        ->toContain('namespace App\Http\Test\Middleware')
        ->toContain('class TestMiddleware')
        ->toContain('public function handle(Request $request, Closure $next): Response');
});
