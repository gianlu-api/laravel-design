<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it("creates a new complete design structure correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "test_domain",
            ],
        ],
        'models' => [
            [
                'name' => '/Domains/TestDomain/Domain/Models/ModelTest',
            ]
        ],
        "classes" => [
            [
                "path" => "/Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "/Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "/Domains/TestDomain/Domain/Abstracts",
                "name" => "TestDomainAbstract",
            ],
        ],
        "requests" => [
            [
                "name" => "../../App/Http/TestDomain/Requests/TestDomainRequest",
            ],
        ],
        "middlewares" => [
            [
                "name" => "../../App/Http/TestDomain/Middlewares/TestDomainMiddleware",
            ],
        ],
        "resources" => [
            [
                "name" => "../../App/Http/TestDomain/Resources/TestDomainResource",
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/TestDomain/Controllers/TestDomainController",
            ],
        ],
        "blade_views" => [
            [
                "name" => "TestBlade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "TestVue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "TestReact",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "test_domain",
            ],
        ],
        'models' => [
            [
                'name' => 'Domains/TestDomain/Domain/Models/ModelTest',
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Abstracts",
                "name" => "TestDomainAbstract",
            ],
        ],
        "requests" => [
            [
                "name" => "../../App/Http/TestDomain/Requests/TestDomainRequest",
            ],
        ],
        "middlewares" => [
            [
                "name" => "../../App/Http/TestDomain/Middlewares/TestDomainMiddleware",
            ],
        ],
        "resources" => [
            [
                "name" => "../../App/Http/TestDomain/Resources/TestDomainResource",
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/TestDomain/Controllers/TestDomainController",
            ],
        ],
        "blade_views" => [
            [
                "name" => "TestBlade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "TestVue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "TestReact",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure from name and path config without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
               "test_domain",
            ],
        ],
        'models' => [
            [
                'path' => "Domains/TestDomain/Domain/Models",
                'name' => 'ModelTest',
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Abstracts",
                "name" => "TestDomainAbstract",
            ],
        ],
        "requests" => [
            [
                "path" => "../../App/Http/TestDomain/Requests",
                "name" => "TestDomainRequest",
            ],
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/TestDomain/Middlewares",
                "name" => "TestDomainMiddleware",
            ],
        ],
        "resources" => [
            [
                "path" => "../../App/Http/TestDomain/Resources",
                "name" => "TestDomainResource",
            ]
        ],
        "controllers" => [
            [
                "path" => "../../App/Http/TestDomain/Controllers",
                "name" => "TestDomainController",
            ],
        ],
        "blade_views" => [
            [
                "name" => "TestBlade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "TestVue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "TestReact",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure with path and names without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "test_domain",
            ],
        ],
        'models' => [
            "path" => "Domains/TestDomain/Domain/Models",
            "names" => [
                "ModelTest",
            ]
        ],
        "classes" => [
            "path" => "Domains/TestDomain/Domain/Services",
            "names" => [
                "TestDomainService"
            ]
        ],
        "interfaces" => [
            "path" => "Domains/TestDomain/Domain/Interfaces",
            "names" => [
                "TestDomainServiceInterface"
            ]
        ],
        "abstract_classes" => [
            "path" => "Domains/TestDomain/Domain/Abstracts",
            "names" => [
                "TestDomainAbstract"
            ]
        ],
        "requests" => [
            "path" => "../../App/Http/TestDomain/Requests",
            "names" => [
                "TestDomainRequest"
            ]
        ],
        "middlewares" => [
            "path" => "../../App/Http/TestDomain/Middlewares",
            "names" => [
                "TestDomainMiddleware"
            ]
        ],
        "resources" => [
            "path" => "../../App/Http/TestDomain/Resources",
            "names" => [
                "TestDomainResource"
            ]
        ],
        "controllers" => [
            "path" => "../../App/Http/TestDomain/Controllers",
            "names" => [
                "TestDomainController"
            ]
        ],
        "blade_views" => [
            [
                "name" => "TestBlade"
            ]
        ],
        "vue_components" => [
            "path" => "js/Pages",
            "names" => [
                "TestVue"
            ]
        ],
        "react_components" => [
            "path" => "js/Pages",
            "names" => [
                "TestReact"
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure with many arrays path and names without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "test_domain",
            ],
        ],
        'models' => [
            [
                "path" => "Domains/TestDomain/Domain/Models",
                "names" => [
                    "ModelTest",
                ]
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Services",
                "names" => [
                    "TestDomainService"
                ]
            ],
            [
                "path" => "Domains/TestDomain/Domain/Repositories",
                "names" => [
                    "TestDomainRepository"
                ]
            ]
        ],
        "interfaces" => [
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "names" => [
                    "TestDomainServiceInterface",
                    "TestDomainRepositoryInterface"
                ]
            ]
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Abstracts",
                "names" => [
                    "TestDomainAbstract"
                ]
            ]
        ],
        "requests" => [
            [
                "path" => "../../App/Http/TestDomain/Requests",
                "names" => [
                    "TestDomainRequest"
                ]
            ]
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/TestDomain/Middlewares",
                "names" => [
                    "TestDomainMiddleware"
                ]
            ]
        ],
        "resources" => [
            [
                "path" => "../../App/Http/TestDomain/Resources",
                "names" => [
                    "TestDomainResource"
                ]
            ]
        ],
        "controllers" => [
            [
                "path" => "../../App/Http/TestDomain/Controllers",
                "names" => [
                    "TestDomainController"
                ]
            ]
        ],
        "blade_views" => [
            [
                "name" => "TestBlade"
            ]
        ],
        "vue_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "TestVue"
                ]
            ]
        ],
        "react_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "TestReact"
                ]
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure with mixed config correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "test_domain",
            ],
        ],
        'models' => [
            'name' => 'Domains/TestDomain/Domain/Models/ModelTest',
        ],
        "classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ]
        ],
        "interfaces" => [
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "names" => [
                    "TestDomainServiceInterface",
                    "TestDomainRepositoryInterface"
                ]
            ]
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Abstracts",
                "names" => [
                    "TestDomainAbstract"
                ]
            ]
        ],
        "requests" => [
            [
                "name" => "../../App/Http/TestDomain/Requests/TestDomainRequest",
            ]
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/TestDomain/Middlewares",
                "name" => "TestDomainMiddleware"
            ]
        ],
        "resources" => [
            [
                "path" => "../../App/Http/TestDomain/Resources",
                "names" => [
                    "TestDomainResource"
                ]
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/TestDomain/Controllers/TestDomainController",
            ]
        ],
        "blade_views" => [
            "name" => "TestBlade"
        ],
        "vue_components" => [
            "path" => "js/Pages",
            "names" => [
                "TestVue"
            ]
        ],
        "react_components" => [
            "path" => "js/Pages",
            "name" => "TestReact"
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["tables"][0]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure from only name config without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "table" => "test_domain",
        ],
        'models' => [
            [
                'name' => 'Domains/TestDomain/Domain/Models/ModelTest',
            ]
        ],
        "classes" => [
            [
                "name" => "Domains/TestDomain/Domain/Services/TestDomainService",
            ],
            [
                "name" => "Domains/TestDomain/Domain/Repositories/TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "name" => "Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface",
            ],
            [
                "name" => "Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "name" => "Domains/TestDomain/Domain/Abstracts/TestDomainAbstract",
            ],
        ],
        "requests" => [
            "name" => "../../App/Http/TestDomain/Requests/TestDomainRequest",
        ],
        "middlewares" => [
            "name" => "../../App/Http/TestDomain/Middlewares/TestDomainMiddleware",
        ],
        "resources" => [
            "name" => "../../App/Http/TestDomain/Resources/TestDomainResource",
        ],
        "controllers" => [
            "name" => "../../App/Http/TestDomain/Controllers/TestDomainController",
        ],
        "blade_views" => [
            [
                "name" => "TestBlade",
            ]
        ],
        "vue_components" => [
            "name" => "js/Pages/TestVue",
        ],
        "react_components" => [
            "name" => "js/Pages/TestReact",
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), $config["migrations"]["table"]));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/ModelTest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainServiceInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Services/TestDomainService.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Repositories/TestDomainRepository.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(resource_path("views/TestBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});
