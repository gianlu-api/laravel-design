<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it("creates a new complete design structure correctly", function () {
    //Arrange
    $config = [
        "migrations" => [
            "tables" => [
                "name" => "test_domain",
            ],
        ],
        'models' => [
            [
                'name' => '/Domains/TestDomain/Domain/Models/ModelTest',
            ]
        ],
        "classes" => [
            [
                "namespace" =>"/Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "namespace" =>"/Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "namespace" =>"/Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "namespace" =>"/Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "namespace" =>"/Domains/TestDomain/Domain/Abstracts",
                "name" => "TestDomainAbstract",
            ],
        ],
        "requests" => [
            [
                "name" =>"../../App/Http/TestDomain/Requests/TestDomainRequest",
            ],
        ],
        "middlewares" => [
            [
                "name" =>"../../App/Http/TestDomain/Middlewares/TestDomainMiddleware",
            ],
        ],
        "resources" => [
            [
                "name" =>"../../App/Http/TestDomain/Resources/TestDomainResource",
            ]
        ],
        "controllers" => [
            [
                "name" =>"../../App/Http/TestDomain/Controllers/TestDomainController",
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
                "namespace" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "TestReact",
                "namespace" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn ($file) => str_contains($file->getFilename(), $config["migrations"]["tables"]["name"]));

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
                "name" => "test_domain",
            ],
        ],
        'models' => [
            [
                'name' => 'Domains/TestDomain/Domain/Models/ModelTest',
            ]
        ],
        "classes" => [
            [
                "namespace" =>"Domains/TestDomain/Domain/Services",
                "name" => "TestDomainService",
            ],
            [
                "namespace" =>"Domains/TestDomain/Domain/Repositories",
                "name" => "TestDomainRepository",
            ],
        ],
        "interfaces" => [
            [
                "namespace" =>"Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainServiceInterface",
            ],
            [
                "namespace" =>"Domains/TestDomain/Domain/Interfaces",
                "name" => "TestDomainRepositoryInterface",
            ],
        ],
        "abstract_classes" => [
            [
                "namespace" =>"Domains/TestDomain/Domain/Abstracts",
                "name" => "TestDomainAbstract",
            ],
        ],
        "requests" => [
            [
                "name" =>"../../App/Http/TestDomain/Requests/TestDomainRequest",
            ],
        ],
        "middlewares" => [
            [
                "name" =>"../../App/Http/TestDomain/Middlewares/TestDomainMiddleware",
            ],
        ],
        "resources" => [
            [
                "name" =>"../../App/Http/TestDomain/Resources/TestDomainResource",
            ]
        ],
        "controllers" => [
            [
                "name" =>"../../App/Http/TestDomain/Controllers/TestDomainController",
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
                "namespace" => "js/Pages",
            ],
        ],
        "react_components" => [
            [
                "name" => "TestReact",
                "namespace" => "js/Pages",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    $migrationFile = collect(File::files(database_path("migrations")))
        ->first(fn ($file) => str_contains($file->getFilename(), $config["migrations"]["tables"]["name"]));

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

