<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;

$customCommandConfigGenerator = null;

beforeAll(function () use (&$customCommandConfigGenerator) {
    $customCommandConfigGenerator = app(CustomCommandConfigGenerator::class);
});

CONST custom = "CustomConfig";

it("generates a class config from path and names array correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        "path" => "Domains/CustomConfig/Domain/Classes/",
        "names" => [
            "CustomConfigClass",
            "CustomConfigClass2"
        ]
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from path and names array and name correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        "path" => "/Domains/&/Domain/Classes/",
        "names" => [
            "&Class",
            "&Class2"
        ]
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from name and path array correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        "name" => "CustomConfigClass",
        "path" => "Domains/CustomConfig/Domain/Classes/"
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from name and path array and name correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        "name" => "&Class",
        "path" => "/Domains/&/Domain/Classes/"
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from path and name arrays correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/"
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/"
        ],
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from path and name arrays with name correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "name" => "&Class",
            "path" => "/Domains/&/Domain/Classes/"
        ],
        [
            "name" => "&Class2",
            "path" => "/Domains/&/Domain/Classes/"
        ],
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from name array correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = ["name" => "/Domains/CustomConfig/Domain/Classes/CustomConfigClass"];

    //Act
    $config = $customCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from name array and name correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = ["name" => "/Domains/&/Domain/Classes/&Class"];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ]
    ]);
});

it("generates a class config from path and names arrays correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "/Domains/CustomConfig/Domain/Classes/",
            "names" => [
                "CustomConfigClass",
                "CustomConfigClass2"
            ]
        ],
        [
            "path" => "/Domains/CustomConfig/Domain/Classes2/",
            "names" => [
                "CustomConfigClass3",
                "CustomConfigClass4"
            ]
        ]
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass3",
            "path" => "/Domains/CustomConfig/Domain/Classes2/",
        ],
        [
            "name" => "CustomConfigClass4",
            "path" => "/Domains/CustomConfig/Domain/Classes2/",
        ]
    ]);
});

it("generates a class config from path and names arrays and name correctly", function () use (&$customCommandConfigGenerator) {
    //Arrange
    $config = [
        [
            "path" => "/Domains/&/Domain/Classes/",
            "names" => [
                "&Class",
                "&Class2"
            ]
        ],
        [
            "path" => "/Domains/&/Domain/Classes2/",
            "names" => [
                "&Class3",
                "&Class4"
            ]
        ]
    ];

    //Act
    $config = $customCommandConfigGenerator->generate($config, custom);

    //Assert
    expect($config)->toBe([
        [
            "name" => "CustomConfigClass",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass2",
            "path" => "/Domains/CustomConfig/Domain/Classes/",
        ],
        [
            "name" => "CustomConfigClass3",
            "path" => "/Domains/CustomConfig/Domain/Classes2/",
        ],
        [
            "name" => "CustomConfigClass4",
            "path" => "/Domains/CustomConfig/Domain/Classes2/",
        ]
    ]);
});
