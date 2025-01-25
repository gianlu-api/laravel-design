<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

$vueGenerator = null;

beforeAll(function () use (&$vueGenerator) {
    $vueGenerator = app(VueConfigGenerator::class);
});

CONST vue = 'VueConfig';

it("generates a vue composition api config correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        "path" => "resources/js/Pages/",
        "names" => [
            "VueTest",
            "VueTest2"
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueTest2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue composition api config from path and names array and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        "path" => "resources/js/Pages/",
        "names" => [
            "&",
            "&2"
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueConfig2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue composition api config from path and name array correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        "name" => "VueTest",
        "path" => "resources/js/Pages/"
    ];

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

it("generates a vue options api config from path and name array correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ]
    ];

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

it("generates a vue composition api config from path and name array and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "&Vue",
            "path" => "resources/js/Pages/"
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config from path and name array and mane correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "&Vue",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});

it("generates a vue composition api config from path and name arrays correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "VueTest",
            "path" => "resources/js/Pages/"
        ],
        [
            "name" => "VueTest2",
            "path" => "resources/js/Pages/"
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueTest2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config from path and name arrays correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ],
        [
            "name" => "VueTest2",
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
        ],
        [
            "name" => "VueTest2",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});

it("generates a vue composition api config from path and name arrays and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "&",
            "path" => "resources/js/Pages/"
        ],
        [
            "name" => "&2",
            "path" => "resources/js/Pages/"
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueConfig2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config from path and name arrays and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "name" => "&",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ],
        [
            "name" => "&2",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ],
        [
            "name" => "VueConfig2",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});

it("generates a vue composition api config from path and names array correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "path" => "resources/js/Pages/",
            "names" => [
                "VueTest",
                "VueTest2"
            ]
        ],
        [
            "path" => "resources/js/Pages2/",
            "names" => [
                "VueTest3",
                "VueTest4"
            ]
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
        ],
        [
            "name" => "VueTest2",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueTest3",
            "path" => "/resources/js/Pages2/",
        ],
        [
            "name" => "VueTest4",
            "path" => "/resources/js/Pages2/",
        ]
    ]);
});

it("generates a vue composition api config from path and names arrays and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        [
            "path" => "resources/js/Pages/",
            "names" => [
                "&",
                "&2"
            ]
        ],
        [
            "path" => "resources/js/Pages2/",
            "names" => [
                "&3",
                "&4"
            ]
        ]
    ];

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueConfig2",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "VueConfig3",
            "path" => "/resources/js/Pages2/",
        ],
        [
            "name" => "VueConfig4",
            "path" => "/resources/js/Pages2/",
        ]
    ]);
});

it("generates a vue composition api config from name array correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = ["name" => "resources/js/Pages/VueTest"];

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

it("generates a vue options api config from name array correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        "name" => "/resources/js/Pages/VueTest",
        "type" => "options",
    ];

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

it("generates a vue composition api config from name array and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = ["name" => "resources/js/Pages/&"];

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config from name array and name correctly", function () use (&$vueGenerator) {
    //Arrange
    $config = [
        "name" => "/resources/js/Pages/&",
        "type" => "options",
    ];

    //Act
    $config = $vueGenerator->generate($config, vue);

    //Assert
    expect($config)->toBe([
        [
            "name" => "VueConfig",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ]
    ]);
});
