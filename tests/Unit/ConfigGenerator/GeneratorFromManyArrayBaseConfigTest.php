<?php declare( strict_types=1 );

use gianluApi\laravelDesign\ConfigGenerator\ControllerConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\CustomCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\LaravelCommandConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\MigrationConfigGenerator;
use gianluApi\laravelDesign\ConfigGenerator\VueConfigGenerator;

it("generates a migration config correctly", function () {
    //Arrange
    $config = [
        "tables" => ["testDomain", "testDomain2"],
    ];
    $migrationGenerator = app(MigrationConfigGenerator::class);

    //Act
    $config = $migrationGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_test_domain_table",
            "--create" => "test_domain",
        ],
        [
            "name" => "create_test_domain2_table",
            "--create" => "test_domain2",
        ]
    ]);
});

it("generates an abstract class correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainAbstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/"
        ],
        [
            "name" => "testDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/"
        ],
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

it("generates an interface config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/"
        ],
        [
            "name" => "testDomainInterface2",
            "path" => "/Domains/TestDomain/Domain/Interfaces/"
        ],
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

it("generates a class config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainClass",
            "path" => "/Domains/TestDomain/Domain/Classes/"
        ],
        [
            "name" => "testDomainClass2",
            "path" => "/Domains/TestDomain/Domain/Classes/"
        ],
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

it("generates an abstract class config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "testDomainAbstract",
            "path" => "Domains/TestDomain/Domain/Abstracts/"
        ],
        [
            "name" => "testDomainAbstract2",
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
        ],
        [
            "name" => "testDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates a model config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"],
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest2"]
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest"],
        ["name" => "app/Domains/TestDomain/Domain/Models/ModelTest2",]
    ]);
});

it("generates a controller config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"],
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController2"],
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

it("generates a controller with resource config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "type" => "resource"],
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController2", "type" => "resource"],
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--resource" => true
        ],
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController2",
            "--resource" => true
        ],
    ]);
});

it("generates a api controller config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController", "type" => "api"],
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController2", "type" => "api"],
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--api" => true
        ],
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController2",
            "--api" => true
        ],
    ]);
});

it("generates a request config correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"],
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest2"],
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
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource"],
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource2"],
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
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"],
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware2"],
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
        ["name" => "resources/views/BladeView"],
        ["name" => "resources/views/BladeView2"],
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        ["name" => "resources/views/BladeView"],
        ["name" => "resources/views/BladeView2"],
    ]);
});

it("generates a vue composition api config correctly", function () {
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

it("generates a vue options api config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "VueTest",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ],
        [
            "name" => "VueTest2",
            "path" => "/resources/js/Pages/"
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
        ]
    ]);
});

it("generates a react config correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "ReactTest",
            "path" => "/resources/js/Pages/"
        ],
        [
            "name" => "ReactTest2",
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
        ],
        [
            "name" => "ReactTest2",
            "path" => "/resources/js/Pages/"
        ]
    ]);
});

CONST name = "TestDomain";

it("generates an abstract class with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Abstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/"
        ],
        [
            "name" => "&Abstract2",
            "path" => "/Domains/&/Domain/Abstracts/"
        ],
    ];
    $abstractClassGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $abstractClassGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainAbstract",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ],
        [
            "name" => "TestDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates an interface config with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Interface",
            "path" => "/Domains/&/Domain/Interfaces/"
        ],
        [
            "name" => "&Interface2",
            "path" => "/Domains/&/Domain/Interfaces/"
        ],
    ];
    $interfaceGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $interfaceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainInterface",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ],
        [
            "name" => "TestDomainInterface2",
            "path" => "/Domains/TestDomain/Domain/Interfaces/",
        ]
    ]);
});

it("generates a class config with name correctly", function () {
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
    $classGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $classGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomainClass",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ],
        [
            "name" => "TestDomainClass2",
            "path" => "/Domains/TestDomain/Domain/Classes/",
        ]
    ]);
});

it("generates an abstract class config with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&Abstract",
            "path" => "Domains/&/Domain/Abstracts/"
        ],
        [
            "name" => "&Abstract2",
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
        ],
        [
            "name" => "TestDomainAbstract2",
            "path" => "/Domains/TestDomain/Domain/Abstracts/",
        ]
    ]);
});

it("generates a model config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Domains/&/Domain/Models/&"],
        ["name" => "app/Domains/&/Domain/Models/&2"]
    ];
    $modelGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $modelGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Domains/TestDomain/Domain/Models/TestDomain"],
        ["name" => "app/Domains/TestDomain/Domain/Models/TestDomain2",]
    ]);
});

it("generates a controller config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller"],
        ["name" => "app/Http/&/Controllers/&Controller2"],
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController"],
        ["name" => "app/Http/TestDomain/Controllers/TestDomainController2"],
    ]);
});

it("generates a controller with resource config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "resource"],
        ["name" => "app/Http/&/Controllers/&Controller2", "type" => "resource"],
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--resource" => true
        ],
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController2",
            "--resource" => true
        ],
    ]);
});

it("generates a api controller config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Controllers/&Controller", "type" => "api"],
        ["name" => "app/Http/&/Controllers/&Controller2", "type" => "api"],
    ];
    $controllerGenerator = app(ControllerConfigGenerator::class);

    //Act
    $config = $controllerGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController",
            "--api" => true
        ],
        [
            "name" => "app/Http/TestDomain/Controllers/TestDomainController2",
            "--api" => true
        ],
    ]);
});

it("generates a request config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Requests/&Request"],
        ["name" => "app/Http/&/Requests/&Request2"],
    ];
    $requestGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $requestGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest"],
        ["name" => "app/Http/TestDomain/Requests/TestDomainRequest2"],
    ]);
});

it("generates a resource config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Resources/&Resource"],
        ["name" => "app/Http/&/Resources/&Resource2"],
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource",],
        ["name" => "app/Http/TestDomain/Resources/TestDomainResource2",]
    ]);
});

it("generates a middleware config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "app/Http/&/Middlewares/&Middleware"],
        ["name" => "app/Http/&/Middlewares/&Middleware2"],
    ];
    $resourceGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $resourceGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware"],
        ["name" => "app/Http/TestDomain/Middlewares/TestDomainMiddleware2"],
    ]);
});

it("generates a blade config with name correctly", function () {
    //Arrange
    $config = [
        ["name" => "resources/views/&"],
        ["name" => "resources/views/&2"],
    ];
    $bladeGenerator = app(LaravelCommandConfigGenerator::class);

    //Act
    $config = $bladeGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        ["name" => "resources/views/TestDomain"],
        ["name" => "resources/views/TestDomain2"],
    ]);
});

it("generates a vue composition api config with name correctly", function () {
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
    $config = $vueGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomain",
            "path" => "/resources/js/Pages/",
        ],
        [
            "name" => "TestDomain2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a vue options api config with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&",
            "path" => "/resources/js/Pages/",
            "type" => "options",
        ],
        [
            "name" => "&2",
            "path" => "/resources/js/Pages/"
        ]
    ];
    $vueGenerator = app(VueConfigGenerator::class);

    //Act
    $config = $vueGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomain",
            "path" => "/resources/js/Pages/",
            "--type" => "options"
        ],
        [
            "name" => "TestDomain2",
            "path" => "/resources/js/Pages/",
        ]
    ]);
});

it("generates a react config with name correctly", function () {
    //Arrange
    $config = [
        [
            "name" => "&",
            "path" => "/resources/js/Pages/"
        ],
        [
            "name" => "&2",
            "path" => "/resources/js/Pages/"
        ]
    ];
    $reactGenerator = app(CustomCommandConfigGenerator::class);

    //Act
    $config = $reactGenerator->generate($config, name);

    //Assert
    expect($config)->toBe([
        [
            "name" => "TestDomain",
            "path" => "/resources/js/Pages/"
        ],
        [
            "name" => "TestDomain2",
            "path" => "/resources/js/Pages/"
        ]
    ]);
});

