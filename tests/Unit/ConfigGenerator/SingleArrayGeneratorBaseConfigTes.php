<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

it("generates an abstract class config with one object class without leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainAbstract",
        "path" => "Domains/TestDomain/Domain/Abstracts/"
    ];
    $abstractClassGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $abstractClassGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainAbstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an abstract class config with one object class and leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainAbstract",
        "path" => "/Domains/TestDomain/Domain/Abstracts/"
    ];
    $abstractClassGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $abstractClassGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainAbstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an interface config with one object and leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainInterface",
        "path" => "/Domains/TestDomain/Domain/Interfaces/"
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/"
        ]
    ]);
});

it("generates a class config with one object with leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainClass",
        "path" => "/Domains/TestDomain/Domain/Classes/"
    ];
    $classGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $classGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainClass",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates an interface config with one object and without leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainInterface",
        "path" => "Domains/TestDomain/Domain/Interfaces/"
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config with one object and without leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainClass",
        "path" => "Domains/TestDomain/Domain/Classes/"
    ];
    $classGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $classGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "testDomainClass",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates a model config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Domains/TestDomain/Domain/Models/ModelTest"
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"]
    ]);
});

it("generates a controller config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Http/TestDomain/Controllers/TestDomainController"
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"]
    ]);
});

it("generates a request config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Http/TestDomain/Requests/TestDomainRequest"
    ];
    $requestGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $requestGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"]
    ]);
});

it("generates a resource config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Http/TestDomain/Resources/TestDomainResource"
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource"]
    ]);
});

it("generates a middleware config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"]
    ]);
});

it("generates a blade config one object correctly", function () {
    //Arrange
    $config = [
        "name" => "resources/views/BladeView"
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "resources/views/BladeView"]
    ]);
});

it("generates a vue composition api config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "VueTest",
        "path" => "resources/js/Pages/"
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config with one object correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
            "component_type" => "options",
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});

it("generates a react config with one object correctly", function () {
    //Arrange
    $config = [
        "name" => "ReactTest",
        "path" => "/resources/js/Pages/"
    ];
    $reactGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $reactGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "ReactTest",
            "path" => "/resources/js/Pages/"
        ]
    ]);
});
