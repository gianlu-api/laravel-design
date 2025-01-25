<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it("creates a new complete design structure correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "&",
            ],
        ],
        'models' => [
            [
                'name' => '/Domains/&/Domain/Models/&Model',
            ]
        ],
        "classes" => [
            [
                "path" => "/Domains/&/Domain/Services",
                "name" => "&Service",
            ],
            [
                "path" => "/Domains/&/Domain/Repositories",
                "name" => "&Repository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "/Domains/&/Domain/Interfaces",
                "name" => "&ServiceInterface",
            ],
            [
                "path" => "/Domains/&/Domain/Interfaces",
                "name" => "&RepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "/Domains/&/Domain/Abstracts",
                "name" => "&Abstract",
            ],
        ],
        "requests" => [
            [
                "name" => "../../App/Http/&/Requests/&Request",
            ],
        ],
        "middlewares" => [
            [
                "name" => "../../App/Http/&/Middlewares/&Middleware",
            ],
        ],
        "resources" => [
            [
                "name" => "../../App/Http/&/Resources/&Resource",
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/&/Controllers/&Controller",
            ],
        ],
        "blade_views" => [
            [
                "name" => "&Blade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "&Vue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "&React",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "&",
            ],
        ],
        'models' => [
            [
                'name' => 'Domains/&/Domain/Models/&Model',
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/&/Domain/Services",
                "name" => "&Service",
            ],
            [
                "path" => "Domains/&/Domain/Repositories",
                "name" => "&Repository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "Domains/&/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "&RepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/&/Domain/Abstracts",
                "name" => "&Abstract",
            ],
        ],
        "requests" => [
            [
                "name" => "../../App/Http/&/Requests/&Request",
            ],
        ],
        "middlewares" => [
            [
                "name" => "../../App/Http/&/Middlewares/&Middleware",
            ],
        ],
        "resources" => [
            [
                "name" => "../../App/Http/&/Resources/&Resource",
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/&/Controllers/&Controller",
            ],
        ],
        "blade_views" => [
            [
                "name" => "&Blade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "&Vue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "&React",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure from name and path config without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "&",
            ],
        ],
        'models' => [
            [
                'path' => "Domains/&/Domain/Models",
                'name' => '&Model',
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/&/Domain/Services",
                "name" => "&Service",
            ],
            [
                "path" => "Domains/&/Domain/Repositories",
                "name" => "&Repository",
            ],
        ],
        "interfaces" => [
            [
                "path" => "Domains/&/Domain/Interfaces",
                "name" => "&ServiceInterface",
            ],
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/&/Domain/Abstracts",
                "name" => "&Abstract",
            ],
        ],
        "requests" => [
            [
                "path" => "../../App/Http/&/Requests",
                "name" => "&Request",
            ],
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/&/Middlewares",
                "name" => "&Middleware",
            ],
        ],
        "resources" => [
            [
                "path" => "../../App/Http/&/Resources",
                "name" => "&Resource",
            ]
        ],
        "controllers" => [
            [
                "path" => "../../App/Http/&/Controllers",
                "name" => "&Controller",
            ],
        ],
        "blade_views" => [
            [
                "name" => "&Blade",
            ]
        ],
        "vue_components" => [
            [
                "name" => "&Vue",
                "path" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "&React",
                "path" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure with path and names without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "&",
            ],
        ],
        'models' => [
            "path" => "Domains/&/Domain/Models",
            "names" => [
                "&Model",
            ]
        ],
        "classes" => [
            "path" => "Domains/&/Domain/Services",
            "names" => [
                "&Service"
            ]
        ],
        "interfaces" => [
            "path" => "Domains/&/Domain/Interfaces",
            "names" => [
                "&ServiceInterface"
            ]
        ],
        "abstract_classes" => [
            "path" => "Domains/&/Domain/Abstracts",
            "names" => [
                "&Abstract"
            ]
        ],
        "requests" => [
            "path" => "../../App/Http/&/Requests",
            "names" => [
                "&Request"
            ]
        ],
        "middlewares" => [
            "path" => "../../App/Http/&/Middlewares",
            "names" => [
                "&Middleware"
            ]
        ],
        "resources" => [
            "path" => "../../App/Http/&/Resources",
            "names" => [
                "&Resource"
            ]
        ],
        "controllers" => [
            "path" => "../../App/Http/&/Controllers",
            "names" => [
                "&Controller"
            ]
        ],
        "blade_views" => [
            [
                "name" => "&Blade"
            ]
        ],
        "vue_components" => [
            "path" => "js/Pages",
            "names" => [
                "&Vue"
            ]
        ],
        "react_components" => [
            "path" => "js/Pages",
            "names" => [
                "&React"
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure with many arrays path and names without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                'test_domain', '&'
            ],
        ],
        'models' => [
            [
                "path" => "Domains/&/Domain/Models",
                "names" => [
                    "&Model",
                ]
            ]
        ],
        "classes" => [
            [
                "path" => "Domains/&/Domain/Services",
                "names" => [
                    "&Service"
                ]
            ],
            [
                "path" => "Domains/&/Domain/Repositories",
                "names" => [
                    "&Repository"
                ]
            ]
        ],
        "interfaces" => [
            [
                "path" => "Domains/&/Domain/Interfaces",
                "names" => [
                    "&ServiceInterface",
                    "&RepositoryInterface"
                ]
            ]
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/&/Domain/Abstracts",
                "names" => [
                    "&Abstract"
                ]
            ]
        ],
        "requests" => [
            [
                "path" => "../../App/Http/&/Requests",
                "names" => [
                    "&Request"
                ]
            ]
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/&/Middlewares",
                "names" => [
                    "&Middleware"
                ]
            ]
        ],
        "resources" => [
            [
                "path" => "../../App/Http/&/Resources",
                "names" => [
                    "&Resource"
                ]
            ]
        ],
        "controllers" => [
            [
                "path" => "../../App/Http/&/Controllers",
                "names" => [
                    "&Controller"
                ]
            ]
        ],
        "blade_views" => [
            [
                "name" => "&Blade"
            ]
        ],
        "vue_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "&Vue"
                ]
            ]
        ],
        "react_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "&React"
                ]
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
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
            'name' => 'Domains/&/Domain/Models/&Model',
        ],
        "classes" => [
            [
                "path" => "Domains/&/Domain/Services",
                "name" => "&Service",
            ],
            [
                "path" => "Domains/&/Domain/Repositories",
                "name" => "&Repository",
            ]
        ],
        "interfaces" => [
            [
                "path" => "Domains/&/Domain/Interfaces",
                "names" => [
                    "&ServiceInterface",
                    "&RepositoryInterface"
                ]
            ]
        ],
        "abstract_classes" => [
            [
                "path" => "Domains/&/Domain/Abstracts",
                "names" => [
                    "&Abstract"
                ]
            ]
        ],
        "requests" => [
            [
                "name" => "../../App/Http/&/Requests/&Request",
            ]
        ],
        "middlewares" => [
            [
                "path" => "../../App/Http/&/Middlewares",
                "name" => "&Middleware"
            ]
        ],
        "resources" => [
            [
                "path" => "../../App/Http/&/Resources",
                "names" => [
                    "&Resource"
                ]
            ]
        ],
        "controllers" => [
            [
                "name" => "../../App/Http/&/Controllers/&Controller",
            ]
        ],
        "blade_views" => [
            "name" => "&Blade"
        ],
        "vue_components" => [
            "path" => "js/Pages",
            "names" => [
                "&Vue"
            ]
        ],
        "react_components" => [
            "path" => "js/Pages",
            "name" => "&React"
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});

it("creates a new complete design structure from only name config without leading slash correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "table" => "&",
        ],
        'models' => [
            [
                'name' => 'Domains/&/Domain/Models/&Model',
            ]
        ],
        "classes" => [
            [
                "name" => "Domains/&/Domain/Services/&Service",
            ],
            [
                "name" => "Domains/&/Domain/Repositories/&Repository",
            ],
        ],
        "interfaces" => [
            [
                "name" => "Domains/&/Domain/Interfaces/&ServiceInterface",
            ],
            [
                "name" => "Domains/&/Domain/Interfaces/&RepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "name" => "Domains/&/Domain/Abstracts/&Abstract",
            ],
        ],
        "requests" => [
            "name" => "../../App/Http/&/Requests/&Request",
        ],
        "middlewares" => [
            "name" => "../../App/Http/&/Middlewares/&Middleware",
        ],
        "resources" => [
            "name" => "../../App/Http/&/Resources/&Resource",
        ],
        "controllers" => [
            "name" => "../../App/Http/&/Controllers/&Controller",
        ],
        "blade_views" => [
            [
                "name" => "&Blade",
            ]
        ],
        "vue_components" => [
            "name" => "js/Pages/&Vue",
        ],
        "react_components" => [
            "name" => "js/Pages/&React",
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design", ["name" => "TestDomain"])->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn($file) => str_contains($file->getFilename(), "test_domain"));

    //Assert
    expect($migrationFile)->not()->toBeNull()
        ->and(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomainModel.php")))->toBeTrue()
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
        ->and(File::exists(resource_path("views/TestDomainBlade.blade.php")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestDomainReact.jsx")))->toBeTrue();
});
