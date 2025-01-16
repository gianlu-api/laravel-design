<?php declare( strict_types=1 );

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\MigrationConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

it("generates a migration config with correctly", function () {
    //Arrange
    $config = [
        "tables" =>
            ["name" => "testDomain"]
    ];
    $migrationGenerator = app(MigrationConfigGenerator::class);

    //Act
    $config = $migrationGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_test_domain_table",
            "--create" => "test_domain",
        ]
    ]);
});

it("generates an abstract class config without leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "Domains/TestDomain/Domain/Abstracts/testDomainAbstract",
        ]
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

it("generates an abstract class config with leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "/Domains/TestDomain/Domain/Abstracts/testDomainAbstract",
        ]
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

it("generates an interface config with leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "/Domains/TestDomain/Domain/Interfaces/TestDomainInterface",
        ]
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates an interface config without leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "Domains/TestDomain/Domain/Interfaces/TestDomainInterface",
        ]
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config with leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "/Domains/TestDomain/Domain/Classes/testDomainClass",
        ]
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

it("generates a class config without leading slash correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "Domains/TestDomain/Domain/Classes/testDomainClass",
        ]
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

it("generates a model config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"]
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"]
    ]);
});

it("generates a controller config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"]
    ]);
});

it("generates a controller with resource config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "type" => "resource"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--resource" => true
        ]
    ]);
});

it("generates a api controller config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "type" => "api"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--api" => true
        ]
    ]);
});

it("generates a request config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"]
    ];
    $requestGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $requestGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"]
    ]);
});

it("generates a resource config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource"]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource"]
    ]);
});

it("generates a middleware config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"]
    ]);
});

it("generates a blade config correctly", function () {
    //Arrange
    $config = [
        ["name" => "resources/views/BladeView"]
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "resources/views/BladeView"]
    ]);
});

it("generates a vue composition api config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "resources/js/Pages/VueTest",
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
        ]
    ]);
});

it("generates a vue options api config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "/resources/js/Pages/VueTest",
            "type" => "options",
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

it("generates a react config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "/resources/js/Pages/ReactTest",
        ]
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
