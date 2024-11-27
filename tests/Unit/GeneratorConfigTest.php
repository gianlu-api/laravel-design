<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;
use gianluApi\laravelDesign\ConfigGenerator\ConfigItemGenerator;

it("generates a migration config correctly", function () {
    //Arrange
    $config = ["name" => "testDomain"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Migration);

    //Assert
    expect($config)->toBe([
        "name" => "create_test_domain_table",
        "--create" => "test_domain",
    ]);
});

it("generates an abstract class config with correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainAbstract",
        "path" => "/Domains/TestDomain/Domain/Abstracts"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::AbstractClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainAbstract",
        "path" => "/Domains/TestDomain/Domain/Abstracts",
    ]);
});

it("generates an interface config with leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainInterface",
        "path" => "/Domains/TestDomain/Domain/Interfaces"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Interface);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainInterface",
        "path" => "/Domains/TestDomain/Domain/Interfaces",
    ]);
});

it("generates a class config with leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainClass",
        "path" => "/Domains/TestDomain/Domain/Classes"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::CustomClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainClass",
        "path" => "/Domains/TestDomain/Domain/Classes",
    ]);
});

it("generates an abstract class without leading slash config correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainAbstract",
        "path" => "Domains/TestDomain/Domain/Abstracts"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::AbstractClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainAbstract",
        "path" => "/Domains/TestDomain/Domain/Abstracts",
    ]);
});

it("generates an interface config without leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainInterface",
        "path" => "Domains/TestDomain/Domain/Interfaces"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Interface);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainInterface",
        "path" => "/Domains/TestDomain/Domain/Interfaces",
    ]);
});

it("generates a class config without leading slash correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainClass",
        "path" => "Domains/TestDomain/Domain/Classes"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::CustomClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainClass",
        "path" => "/Domains/TestDomain/Domain/Classes",
    ]);
});

it("generates a model config correctly", function () {
    //Arrange
    $config = ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Model);

    //Assert
    expect($config)->toBe([
        "name" => "app/Domains/TestDomain/Domain/Models/ModelTest",
    ]);
});

it("generates a controller config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Controllers/TestDomainController"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Controller);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Controllers/TestDomainController",
    ]);
});

it("generates a controller with resource config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "is_resource" => true];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Controller);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Controllers/TestDomainController",
        "--resource" => true,
    ]);
});

it("generates a api controller config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "is_api" => true];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Controller);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Controllers/TestDomainController",
        "--api" => true,
    ]);
});

it("generates a request config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Request);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Requests/TestDomainRequest",
    ]);
});

it("generates a resource config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Resources/TestDomainResource"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Resource);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Resources/TestDomainResource",
    ]);
});

it("generates a middleware config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Middleware);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware",
    ]);
});

it("generates a blade config correctly", function () {
    //Arrange
    $config = ["name" => "resources/views/BladeView"];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Blade);

    //Assert
    expect($config)->toBe([
        "name" => "resources/views/BladeView"
    ]);
});

it("generates a vue composition api config correctly", function () {
    //Arrange
    $config = [
        "name" => "VueTest",
        "path" => "resources/js/Pages"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Vue);

    //Assert
    expect($config)->toBe([
        "name" => "VueTest",
        "path" => "resources/js/Pages",
    ]);
});

it("generates a vue options api config correctly", function () {
    //Arrange
    $config = [
        "name" => "VueTest",
        "path" => "resources/js/Pages",
        "component_type" => "options"
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::Vue);

    //Assert
    expect($config)->toBe([
        "name" => "VueTest",
        "path" => "resources/js/Pages",
        "--type" => "options"
    ]);
});

it("generates a react config correctly", function () {
    //Arrange
    $config = [
        "name" => "ReactTest",
        "path" => "resources/js/Pages",
    ];

    //Act
    $config = ConfigItemGenerator::generate($config, GeneratorTypes::React);

    //Assert
    expect($config)->toBe([
        "name" => "ReactTest",
        "path" => "resources/js/Pages",
    ]);
});
