<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it("creates a new design structure with model with leading slash correctly", function () {
    //Arrange
    $config = [
        "models" => [
            "path" =>"/Domains/TestDomain/Domain/Models",
            "names" => [
                "TestDomain",
                "TestDomain2",
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomain.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomain2.php")))->toBeTrue();
});

it("creates a new design structure with class correctly", function () {
    //Arrange
    $config = [
        "classes" => [
            "path" => "Domains/TestDomain/Domain/Classes",
            "names" => [
                "TestDomainClass",
                "TestDomainClass2",
                "TestDomainClass3",
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass3.php")))->toBeTrue();
});

it("creates a new design structure with class with leading slash correctly", function () {
    //Arrange
    $config = [
        "classes" => [
            "path" => "/Domains/TestDomain/Domain/Classes",
            "names" => [
                "TestDomainClass",
                "TestDomainClass2",
                "TestDomainClass3",
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php")))->toBeTrue();
});

it("creates a new design structure with abstract class correctly", function () {
    //Arrange
    $config = [
        "abstract_classes" => [
            "path" => "Domains/TestDomain/Domain/Abstracts",
            "names" => [
                "TestDomainAbstract",
                "TestDomainAbstract2",
                "TestDomainAbstract3",
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract3.php")))->toBeTrue();
});

it("creates a new design structure with abstract class with leading slash correctly", function () {
    //Arrange
    $config = [
        "abstract_classes" => [
            "path" => "/Domains/TestDomain/Domain/Abstracts",
            "names" => [
                "TestDomainAbstract",
                "TestDomainAbstract2",
                "TestDomainAbstract3",
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract3.php")))->toBeTrue();
});

it("creates a new design structure with custom path request correctly", function () {
    //Arrange
    $config = [
        "requests" => [
            "path" => "../../App/Http/TestDomain/Requests",
            "names" => [
                "TestDomainRequest",
                "TestDomainRequest2",
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests/TestDomainRequest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests/TestDomainRequest2.php")))->toBeTrue();
});

it("creates a new design structure with interfaces correctly", function () {
    //Arrange
    $config = [
        "interfaces" => [
            "path" => "/Domains/TestDomain/Domain/Interfaces",
            "names" => [
                "TestDomainRepositoryInterface",
                "TestDomainRepositoryInterface2"
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php")))->toBeTrue();
});

it("creates a new design structure with interfaces without leading slash correctly", function () {
    //Arrange
    $config = [
        "interfaces" => [
            "path" => "Domains/TestDomain/Domain/Interfaces",
            "names" => [
                "TestDomainRepositoryInterface",
                "TestDomainRepositoryInterface2"
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php")))->toBeTrue();
});

it("creates a new design structure with custom path controller correctly", function () {
    //Arrange
    $config = [
        "controllers" => [
            "path" => "../../App/Http/TestDomain/Controllers",
            "names" => [
                "TestDomainController"
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue();
});

it("creates a new design structure with custom path resource correctly", function () {
    //Arrange
    $config = [
        "resources" => [
            "path" => "../../App/Http/TestDomain/Resources",
            "names" => [
                "TestDomainResource"
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))->toBeTrue();
});

it("creates a new design structure with custom path middleware correctly", function () {
    //Arrange
    $config = [
        "middlewares" => [
            "path" => "../../App/Http/TestDomain/Middlewares",
            "names" => [
                "TestDomainMiddleware"
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue();
});

it("creates a new design structure with vue composition api component correctly", function () {
    //Arrange
    $config = [
        "vue_components" => [
            "path" => "js/Pages",
            "names" => [
                "TestVue",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue();
});


it("creates a new design structure with react component correctly", function () {
    //Arrange
    $config = [
        "react_components" => [
            "path" => "js/Pages",
            "names" => [
                "TestReact",
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue();
});

