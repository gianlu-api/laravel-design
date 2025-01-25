<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;

$controllerGenerator = null;

beforeAll(function () use (&$controllerGenerator) {
    $controllerGenerator = app(ControllerConfigGenerator::class);
});

CONST controller = "ControllerConfig";

it("generates a controller config correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"]
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"]
    ]);
});


it("generates a controller config from name array with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller"]
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"]
    ]);
});

it("generates a api controller config from name array correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController", "type" => "api"]
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--api" => true
        ]
    ]);
});

it("generates a api controller config from name array with name correctly", function ()  use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "api"]
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--api" => true
        ]
    ]);
});



it("generates a resource controller config from name array correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController", "type" => "resource"]
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--resource" => true
        ]
    ]);
});

it("generates a controller config from path and names array correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        "path" => "app/Http/ControllerConfig/Controllers/",
        "names" => [
            "ControllerConfigController",
            "ControllerConfigController2"
        ]
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
    ]);
});

it("generates a controller config from path and names array with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        "path" => "app/Http/&/Controllers/",
        "names" => [
            "&Controller",
            "&Controller2"
        ]
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
    ]);
});

it("generates a controller config from many name arrays correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
    ]);
});

it("generates a resource controller config from many name arrays correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController", "type" => "resource"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2", "type" => "resource"],
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--resource" => true
        ],
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2",
            "--resource" => true
        ],
    ]);
});

it("generates a api controller config from many name arrays correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController", "type" => "api"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2", "type" => "api"],
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--api" => true
        ],
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2",
            "--api" => true
        ],
    ]);
});

it("generates a controller config from many name arrays with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller"],
        ["name" => "app/Http/&/Controllers/&Controller2"],
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
    ]);
});

it("generates a resource controller config from many name arrays with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "resource"],
        ["name" => "app/Http/&/Controllers/&Controller2", "type" => "resource"],
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--resource" => true
        ],
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2",
            "--resource" => true
        ],
    ]);
});

it("generates a api controller config from many name arrays with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "api"],
        ["name" => "app/Http/&/Controllers/&Controller2", "type" => "api"],
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--api" => true
        ],
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2",
            "--api" => true
        ],
    ]);
});

it("generates a controller config from path and names arrays correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Http/ControllerConfig/Controllers/",
            "names" => [
                "ControllerConfigController",
                "ControllerConfigController2"
            ]
        ],
        [
            "path" => "app/Http/ControllerConfig/Controllers2/",
            "names" => [
                "ControllerConfigController3",
                "ControllerConfigController4"
            ]
        ]
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
        ["name" => "app/Http/ControllerConfig/Controllers2/ControllerConfigController3"],
        ["name" => "app/Http/ControllerConfig/Controllers2/ControllerConfigController4"],
    ]);
});


it("generates a controller config from path and names arrays with name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        [
            "path" => "app/Http/&/Controllers/",
            "names" => [
                "&Controller",
                "&Controller2"
            ]
        ],
        [
            "path" => "app/Http/&/Controllers2/",
            "names" => [
                "&Controller3",
                "&Controller4"
            ]
        ]
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"],
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController2"],
        ["name" => "app/Http/ControllerConfig/Controllers2/ControllerConfigController3"],
        ["name" => "app/Http/ControllerConfig/Controllers2/ControllerConfigController4"],
    ]);
});

it("generates a controller config from single name array correctly", function () {
    //Arrange
    $config = [
        "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"]
    ]);
});

it("generates a controller config from single name array and name correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        "name" => "app/Http/&/Controllers/&Controller"
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController"]
    ]);
});

it("generates a resource controller from single name array config correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
        "type" => "resource"
    ];

    //Act
    $config = $controllerGenerator->generate($config, controller);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--resource" => true
        ]
    ]);
});

it("generates a api controller from single name array config correctly", function () use (&$controllerGenerator) {
    //Arrange
    $config = [
        "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
        "type" => "api"
    ];

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/ControllerConfig/Controllers/ControllerConfigController",
            "--api" => true
        ]
    ]);
});
