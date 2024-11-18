<?php declare(strict_types=1);

use gianluApi\laravelDesign\Types\Enums\Types;
use gianluApi\laravelDesign\Types\TypeConfigGenerator;

it("generates a migration config correctly", function () {
    //Arrange
    $config = ["name" => "testDomain"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Migration);

    //Assert
    expect($config)->toBe([
        "name" => "create_test_domain_table",
        "--create" => "test_domain",
    ]);
});

it("generates an abstract class config correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainAbstract",
        "namespace" => "app/Domains/TestDomain/Domain/Abstracts"
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::AbstractClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainAbstract",
        "namespace" => "app/Domains/TestDomain/Domain/Abstracts",
    ]);
});

it("generates an interface config correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainInterface",
        "namespace" => "app/Domains/TestDomain/Domain/Interfaces"
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Interface);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainInterface",
        "namespace" => "app/Domains/TestDomain/Domain/Interfaces",
    ]);
});

it("generates a class config correctly", function () {
    //Arrange
    $config = [
        "name" => "testDomainClass",
        "namespace" => "app/Domains/TestDomain/Domain/Classes"
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::CustomClass);

    //Assert
    expect($config)->toBe([
        "name" => "testDomainClass",
        "namespace" => "app/Domains/TestDomain/Domain/Classes",
    ]);
});

it("generates a model config correctly", function () {
    //Arrange
    $config = ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Model);

    //Assert
    expect($config)->toBe([
        "name" => "app/Domains/TestDomain/Domain/Models/ModelTest",
    ]);
});

it("generates a controller config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Controllers/TestDomainController"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Controller);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Controllers/TestDomainController",
    ]);
});

it("generates a controller with resource config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "with_resources" => true];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Controller);

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
    $config = TypeConfigGenerator::generate($config, Types::Controller);

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
    $config = TypeConfigGenerator::generate($config, Types::Request);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Requests/TestDomainRequest",
    ]);
});

it("generates a resource config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Resources/TestDomainResource"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Resource);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Resources/TestDomainResource",
    ]);
});

it("generates a middleware config correctly", function () {
    //Arrange
    $config = ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Middleware);

    //Assert
    expect($config)->toBe([
        "name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware",
    ]);
});

it("generates a blade config correctly", function () {
    //Arrange
    $config = ["name" => "resources/views/BladeView"];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Blade);

    //Assert
    expect($config)->toBe([
        "name" => "resources/views/BladeView"
    ]);
});

it("generates a vue composition api config correctly", function () {
    //Arrange
    $config = [
        "name" => "VueTest",
        "namespace" => "resources/js/Pages"
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Vue);

    //Assert
    expect($config)->toBe([
        "name" => "VueTest",
        "namespace" => "resources/js/Pages",
    ]);
});

it("generates a vue options api config correctly", function () {
    //Arrange
    $config = [
        "name" => "VueTest",
        "namespace" => "resources/js/Pages",
        "component_type" => "options"
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::Vue);

    //Assert
    expect($config)->toBe([
        "name" => "VueTest",
        "namespace" => "resources/js/Pages",
        "--type" => "options"
    ]);
});

it("generates a react config correctly", function () {
    //Arrange
    $config = [
        "name" => "ReactTest",
        "namespace" => "resources/js/Pages",
    ];

    //Act
    $config = TypeConfigGenerator::generate($config, Types::React);

    //Assert
    expect($config)->toBe([
        "name" => "ReactTest",
        "namespace" => "resources/js/Pages",
    ]);
});

