<?php declare( strict_types=1 );

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

it("generates an abstract class config with correctly", function () {
    //Arrange
    $config = [
        "path" => "Domains/TestDomain/Domain/Abstracts/",
        "names" => [
            "testDomainAbstract",
            "testDomainAbstract2"
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
        ],
        [
            "name" => "testDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an interface config with leading slash correctly", function () {
    //Arrange
    $config = [
        "path" => "/Domains/TestDomain/Domain/Interfaces/",
        "names" => [
            "testDomainInterface",
            "testDomainInterface2"
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
        ],
        [
            "name" => "testDomainInterface2",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config with leading slash correctly", function () {
    //Arrange
    $config = [
        "path" => "/Domains/TestDomain/Domain/Classes/",
        "names" => [
            "testDomainClass",
            "testDomainClass2"
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
        ],
        [
            "name" => "testDomainClass2",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates an abstract class without leading slash config correctly", function () {
    //Arrange
    $config = [
        "path" => "Domains/TestDomain/Domain/Abstracts/",
        "names" => [
            "testDomainAbstract",
            "testDomainAbstract2"
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
        ],
        [
            "name" => "testDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an interface config without leading slash correctly", function () {
    //Arrange
    $config = [
        "path" => "Domains/TestDomain/Domain/Interfaces/",
        "names" => [
            "testDomainInterface",
            "testDomainInterface2"
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
        ],
        [
            "name" => "testDomainInterface2",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config without leading slash correctly", function () {
    //Arrange
    $config = [
        "path" => "Domains/TestDomain/Domain/Classes/",
        "names" => [
            "testDomainClass",
            "testDomainClass2"
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
        ],
        [
            "name" => "testDomainClass2",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates a model config correctly", function () {
    //Arrange
    $config = [
        "path" => "app/Domains/TestDomain/Models/",
        "names" => [
            "ModelTest",
            "ModelTest2"
        ]
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Models/ModelTest"],
        ["name" => "app/Domains/TestDomain/Models/ModelTest2",]
    ]);
});

it("generates a controller config correctly", function () {
    //Arrange
    $config = [
        "path" => "app/Http/TestDomain/Controllers/",
        "names" => [
            "TestDomainController",
            "TestDomainController2"
        ]
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"],
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController2"],
    ]);
});

it("generates a request config correctly", function () {
    //Arrange
    $config = [
        "path" => "app/Http/TestDomain/Requests/",
        "names" => [
            "TestDomainRequest",
            "TestDomainRequest2"
        ]
    ];
    $requestGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $requestGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"],
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest2"],
    ]);
});

it("generates a resource config correctly", function () {
    //Arrange
    $config = [
        "path" => "app/Http/TestDomain/Resources/",
        "names" => [
            "TestDomainResource",
            "TestDomainResource2"
        ]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource",],
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource2",]
    ]);
});

it("generates a middleware config correctly", function () {
    //Arrange
    $config = [
        "path" => "app/Http/TestDomain/Middlewares/",
        "names" => [
            "TestDomainMiddleware",
            "TestDomainMiddleware2"
        ]
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"],
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware2"],
    ]);
});

it("generates a blade config correctly", function () {
    //Arrange
    $config = [
        "path" => "resources/views/",
        "names" => [
            "BladeView",
            "BladeView2"
        ]
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "/resources/views/BladeView"],
        ["name" => "/resources/views/BladeView2"],
    ]);
});

it("generates a vue composition api config correctly", function () {
    //Arrange
    $config = [
        "path" => "resources/js/Pages/",
        "names" => [
            "VueTest",
            "VueTest2"
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
        ]
    ]);
});

it("generates a react config correctly", function () {
    //Arrange
    $config = [
        "path" => "resources/js/Pages/",
        "names" => [
            "ReactTest",
            "ReactTest2"
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
        ],
        [
            "name" => "ReactTest2",
            "path" => "/resources/js/Pages/"
        ]
    ]);
});

