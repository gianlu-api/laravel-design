<?php declare( strict_types=1 );

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\MigrationConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

it("generates a migration config with correctly", function () {
    //Arrange
    $config = [
        "tables" => ["testDomain"]
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

it("generates an abstract class config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainAbstract",
            "path" => "Domains/TestDomain/Domain/Abstracts/"
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

it("generates an interface config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/"
        ]
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

it("generates a class config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainClass",
            "path" => "Domains/TestDomain/Domain/Classes/"
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
            "name" => "VueTest",
            "path" => "resources/js/Pages/"
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
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
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
            "name" => "ReactTest",
            "path" => "/resources/js/Pages/"
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

const name = "TestDomain";

it("generates a migration config and name correctly", function () {
    //Arrange
    $config = [
        "tables" => ["&"]
    ];
    $migrationGenerator = app(MigrationConfigGenerator::class);

    //Act
    $config = $migrationGenerator->generate($config, 'TestDomain');

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_test_domain_table",
            "--create" => "test_domain",
        ]
    ]);
});

it("generates an abstract class config and name", function () {
    //Arrange
    $config = [
        [
            "name" => "&Abstract",
            "path" => "Domains/&/Domain/Abstracts/"
        ]
    ];
    $abstractClassGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $abstractClassGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainAbstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an interface config and name", function () {
    //Arrange
    $config = [
        [
            "name" => "&Interface",
            "path" => "/Domains/&/Domain/Interfaces/"
        ]
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config and name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Class",
            "path" => "/Domains/&/Domain/Classes/"
        ]
    ];
    $classGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $classGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainClass",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates a model config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Domains/&/Domain/Models/&"]
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Domain/Models/TestDomain"]
    ]);
});

it("generates a controller config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"]
    ]);
});

it("generates a controller with resource config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "resource"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--resource" => true
        ]
    ]);
});

it("generates a api controller config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "api"]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--api" => true
        ]
    ]);
});

it("generates a request config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Requests/&Request"]
    ];
    $requestGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $requestGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"]
    ]);
});

it("generates a resource config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Resources/&Resource"]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource"]
    ]);
});

it("generates a middleware config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Middlewares/&Middleware"]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"]
    ]);
});

it("generates a blade config and name correctly", function () {
    //Arrange
    $config = [
        ["name" => "resources/views/&View"]
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "resources/views/TestDomainView"]
    ]);
});

it("generates a vue composition api config and name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Vue",
            "path" => "resources/js/Pages/"
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainVue",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config and mane correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Vue",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainVue",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});

it("generates a react config with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&React",
            "path" => "/resources/js/Pages/"
        ]
    ];
    $reactGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $reactGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainReact",
            "path" => "/resources/js/Pages/"
        ]
    ]);
});

