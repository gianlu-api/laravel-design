<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it("creates a new design structure with model with leading slash correctly", function () {
    //Arrange
    $config = [
        "models" => [
            [
                "path" => "/Domains/TestDomain/Domain/Models",
                "names" => [
                    "TestDomain",
                    "TestDomain2",
                ],
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Models2",
                "names" => [
                    "TestDomain3",
                    "TestDomain4",
                ],
            ]
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
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models/TestDomain2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models2/TestDomain3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Models2/TestDomain4.php")))->toBeTrue();
});

it("creates a new design structure with class correctly", function () {
    //Arrange
    $config = [
        "classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Classes",
                "names" => [
                    "TestDomainClass",
                    "TestDomainClass2",
                    "TestDomainClass3",
                ]
            ],
            [
                "path" => "Domains/TestDomain/Domain/Classes2",
                "names" => [
                    "TestDomainClass4",
                    "TestDomainClass5",
                    "TestDomainClass6",
                ]
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass4.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass5.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass6.php")))->toBeTrue();
});

it("creates a new design structure with class with leading slash correctly", function () {
    //Arrange
    $config = [
        "classes" => [
            [
                "path" => "/Domains/TestDomain/Domain/Classes",
                "names" => [
                    "TestDomainClass",
                    "TestDomainClass2",
                    "TestDomainClass3",
                ]
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Classes2",
                "names" => [
                    "TestDomainClass4",
                    "TestDomainClass5",
                    "TestDomainClass6",
                ]
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes/TestDomainClass3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass4.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass5.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Classes2/TestDomainClass6.php")))->toBeTrue();
});

it("creates a new design structure with abstract class correctly", function () {
    //Arrange
    $config = [
        "abstract_classes" => [
            [
                "path" => "Domains/TestDomain/Domain/Abstracts",
                "names" => [
                    "TestDomainAbstract",
                    "TestDomainAbstract2",
                    "TestDomainAbstract3",
                ]
            ],
            [
                "path" => "Domains/TestDomain/Domain/Abstracts2",
                "names" => [
                    "TestDomainAbstract4",
                    "TestDomainAbstract5",
                    "TestDomainAbstract6",
                ]
            ]

        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract4.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract5.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract6.php")))->toBeTrue();
});

it("creates a new design structure with abstract class with leading slash correctly", function () {
    //Arrange
    $config = [
        "abstract_classes" => [
            [
                "path" => "/Domains/TestDomain/Domain/Abstracts",
                "names" => [
                    "TestDomainAbstract",
                    "TestDomainAbstract2",
                    "TestDomainAbstract3",
                ]
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Abstracts2",
                "names" => [
                    "TestDomainAbstract4",
                    "TestDomainAbstract5",
                    "TestDomainAbstract6",
                ]
            ]

        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract4.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract5.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Abstracts2/TestDomainAbstract6.php")))->toBeTrue();
});

it("creates a new design structure with custom path request correctly", function () {
    //Arrange
    $config = [
        "requests" => [
            [
                "path" => "../../App/Http/TestDomain/Requests",
                "names" => [
                    "TestDomainRequest",
                    "TestDomainRequest2",
                ],
            ],
            [
                "path" => "../../App/Http/TestDomain/Requests2",
                "names" => [
                    "TestDomainRequest3",
                    "TestDomainRequest4",
                ],
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests/TestDomainRequest.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests/TestDomainRequest2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests2")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests2/TestDomainRequest3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Requests2/TestDomainRequest4.php")))->toBeTrue();
});

it("creates a new design structure with interfaces correctly", function () {
    //Arrange
    $config = [
        "interfaces" => [
            [
                "path" => "/Domains/TestDomain/Domain/Interfaces",
                "names" => [
                    "TestDomainRepositoryInterface",
                    "TestDomainRepositoryInterface2"
                ]
            ],
            [
                "path" => "/Domains/TestDomain/Domain/Interfaces2",
                "names" => [
                    "TestDomainRepositoryInterface3",
                    "TestDomainRepositoryInterface4"
                ]
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2/TestDomainRepositoryInterface3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2/TestDomainRepositoryInterface4.php")))->toBeTrue();
});

it("creates a new design structure with interfaces without leading slash correctly", function () {
    //Arrange
    $config = [
        "interfaces" => [
            [
                "path" => "Domains/TestDomain/Domain/Interfaces",
                "names" => [
                    "TestDomainRepositoryInterface",
                    "TestDomainRepositoryInterface2"
                ]
            ],
            [
                "path" => "Domains/TestDomain/Domain/Interfaces2",
                "names" => [
                    "TestDomainRepositoryInterface3",
                    "TestDomainRepositoryInterface4"
                ],
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    expect(File::exists(base_path("app/Domains/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2/TestDomainRepositoryInterface3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/Domains/TestDomain/Domain/Interfaces2/TestDomainRepositoryInterface4.php")))->toBeTrue();
});

it("creates a new design structure with custom path controller correctly", function () {
    //Arrange
    $config = [
        "controllers" => [
            [
                "path" => "../../App/Http/TestDomain/Controllers",
                "names" => [
                    "TestDomainController",
                    "TestDomainController2"
                ]
            ],
            [
                "path" => "../../App/Http/TestDomain/Controllers2",
                "names" => [
                    "TestDomainController3",
                    "TestDomainController4"
                ],
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers/TestDomainController2.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers2")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers2/TestDomainController3.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Controllers2/TestDomainController4.php")))->toBeTrue();
});

it("creates a new design structure with custom path resource correctly", function () {
    //Arrange
    $config = [
        "resources" => [
            [
                "path" => "../../App/Http/TestDomain/Resources",
                "names" => [
                    "TestDomainResource"
                ]
            ],
            [
                "path" => "../../App/Http/TestDomain/Resources2",
                "names" => [
                    "TestDomainResource2",
                    "TestDomainResource3"
                ]
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain/Resources")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources/TestDomainResource.php")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources2")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources2/TestDomainResource2.php")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Resources2/TestDomainResource3.php")))->toBeTrue();
});

it("creates a new design structure with custom path middleware correctly", function () {
    //Arrange
    $config = [
        "middlewares" => [
            [
                "path" => "../../App/Http/TestDomain/Middlewares",
                "names" => [
                    "TestDomainMiddleware"
                ]
            ],
            [
                "path" => "../../App/Http/TestDomain/Middlewares2",
                "names" => [
                    "TestDomainMiddleware2",
                    "TestDomainMiddleware3"
                ]
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(base_path("app/App/Http/TestDomain/Middlewares")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php")))->toBeTrue()
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares2")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares2/TestDomainMiddleware2.php")))
        ->and(File::exists(base_path("app/App/Http/TestDomain/Middlewares2/TestDomainMiddleware3.php")))->toBeTrue();
});

it("creates a new design structure with vue composition api component correctly", function () {
    //Arrange
    $config = [
        "vue_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "TestVue",
                ]
            ],
            [
                "path" => "js/Pages2",
                "names" => [
                    "TestVue2",
                    "TestVue3"
                ],
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestVue.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2/TestVue2.vue")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2/TestVue3.vue")))->toBeTrue();
});

it("creates a new design structure with react component correctly", function () {
    //Arrange
    $config = [
        "react_components" => [
            [
                "path" => "js/Pages",
                "names" => [
                    "TestReact",
                ]
            ],
            [
                "path" => "js/Pages2",
                "names" => [
                    "TestReact2",
                    "TestReact3"
                ],
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan("make:design")->assertSuccessful();

    //Assert
    expect(File::exists(resource_path("js/Pages")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages/TestReact.jsx")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2/TestReact2.jsx")))->toBeTrue()
        ->and(File::exists(resource_path("js/Pages2/TestReact3.jsx")))->toBeTrue();
});
