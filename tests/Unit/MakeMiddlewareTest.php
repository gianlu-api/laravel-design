<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new Middleware correctly', function () {
    //Arrange
    $config = [
        "name" => "TestMiddleware"
    ];

    //Act
    $this->artisan('make:middleware', $config)->assertSuccessful();

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
    $this->artisan('make:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Middleware')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Middleware/TestMiddleware.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Middleware/TestMiddleware.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a new Middleware with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Middlewares/TestMiddleware"
    ];

    //Act
    $this->artisan('make:middleware', $config)->assertSuccessful();

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
    $this->artisan('make:middleware', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Middlewares')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Middlewares/TestMiddleware.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Middlewares/TestMiddleware.php'));
    expect($actualContent)->toBe($expectedContent);
});
