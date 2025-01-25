<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;

$laravelCommandConfigGenerator = null;

beforeAll(function () use (&$laravelCommandConfigGenerator) {
    $laravelCommandConfigGenerator = app(LaravelCommandConfigGenerator::class);
});

CONST laravel = "LaravelConfig";

it("generates a model config from path and names array correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        "path" => "app/Domains/LaravelConfig/Models/",
        "names" => [
            "ModelTest",
            "ModelTest2"
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Models/ModelTest"],
        ["name" => "app/Domains/LaravelConfig/Models/ModelTest2",]
    ]);
});

it("generates a model config from path and names array and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        "path" => "app/Domains/&/Models/",
        "names" => [
            "&",
            "&2"
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Models/LaravelConfig"],
        ["name" => "app/Domains/LaravelConfig/Models/LaravelConfig2"]
    ]);
});

it("generates a model config from name array correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest"];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest"]
    ]);
});

it("generates a model config from name array and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = ["name" => "app/Domains/&/Domain/Models/&"];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"]
    ]);
});

it("generates a model config from name arrays correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest"],
        ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest2"]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest"],
        ["name" => "app/Domains/LaravelConfig/Domain/Models/ModelTest2",]
    ]);
});

it("generates a model config name arrays and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Domains/&/Domain/Models/&"],
        ["name" => "app/Domains/&/Domain/Models/&2"]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"],
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig2",]
    ]);
});

it("generates a model config from name and path array correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        "path" => "app/Domains/LaravelConfig/Domain/Models/",
        "name" => "LaravelConfig"
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"],
    ]);
});

it("generates a model config from name and path array and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config =  [
        "path" => "app/Domains/&/Domain/Models/",
        "name" => "&"
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"],
    ]);
});


it("generates a model config from name and path arrays correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Domains/LaravelConfig/Domain/Models/",
            "name" => "LaravelConfig"
        ],
        [
            "path" => "app/Domains/LaravelConfig/Domain/Models/",
            "name" => "LaravelConfig2"
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"],
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig2",]
    ]);
});

it("generates a model config from name and path arrays and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Domains/&/Domain/Models/",
            "name" => "&"
        ],
        [
            "path" => "app/Domains/&/Domain/Models/",
            "name" => "&2"
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig"],
        ["name" => "app/Domains/LaravelConfig/Domain/Models/LaravelConfig2"]
    ]);
});

it("generates a model config from path and names arrays correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Domains/LaravelConfig/Models/",
            "names" => [
                "ModelTest",
                "ModelTest2"
            ]
        ],
        [
            "path" => "app/Domains/LaravelConfig/Models2/",
            "names" => [
                "ModelTest3",
                "ModelTest4"
            ]
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Models/ModelTest"],
        ["name" => "app/Domains/LaravelConfig/Models/ModelTest2"],
        ["name" => "app/Domains/LaravelConfig/Models2/ModelTest3"],
        ["name" => "app/Domains/LaravelConfig/Models2/ModelTest4"]
    ]);
});

it("generates a model config from path and names arrays and name correctly", function () use (&$laravelCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Domains/&/Models/",
            "names" => [
                "&",
                "&2"
            ]
        ],
        [
            "path" => "app/Domains/&/Models2/",
            "names" => [
                "&3",
                "&4"
            ]
        ]
    ];

    //Act
    $config = $laravelCommandConfigGenerator->generate($config, laravel);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/LaravelConfig/Models/LaravelConfig"],
        ["name" => "app/Domains/LaravelConfig/Models/LaravelConfig2"],
        ["name" => "app/Domains/LaravelConfig/Models2/LaravelConfig3"],
        ["name" => "app/Domains/LaravelConfig/Models2/LaravelConfig4"]
    ]);
});
