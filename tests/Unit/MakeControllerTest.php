<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new controller correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController"
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new controller content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController"
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    //
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a new controller with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController"
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new controller with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController"
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Controllers;

use Illuminate\Http\Request;

class TestController
{
    //
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a new api controller correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController",
        "--api" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new api controller content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController",
        "--api" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a api new controller with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--api" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new api controller with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--api" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a resource new controller correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Controllers/TestController",
        "--resource" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new resource controller content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController",
        "--resource" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a resource new controller with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--resource" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new resource controller with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--resource" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a invokable new controller correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Controllers/TestController",
        "--invokable" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new invokable controller content correctly', function () {
    //Arrange
    $config = [
        "name" => "TestController",
        "--invokable" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a invokable new controller with custom name correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--invokable" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();
});

it('creates a new invokable controller with custom name content correctly', function () {
    //Arrange
    $config = [
        "name" => "../../Http/Test/Controllers/TestController",
        "--invokable" => true
    ];

    //Act
    $this->artisan('design:controller', $config)->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Test/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Test/Controllers/TestController.php')))->toBeTrue();

    $expectedContent = <<<'PHP'
<?php

namespace App\Http\Test\Controllers;

use Illuminate\Http\Request;

class TestController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
}

PHP;

    $actualContent = file_get_contents(base_path('app/Http/Test/Controllers/TestController.php'));
    expect($actualContent)->toBe($expectedContent);
});

