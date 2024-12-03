<?php declare( strict_types=1 );

use Illuminate\Support\Facades\File;

it('creates a new design structure model correctly', function () {
    //Arrange
    $config = [
        'models' => [
            [
                'name' => '/Domains/TestDomain/Domain/Models/TestDomain',
            ],
            [
                'name' => '/Domains/TestDomain/Domain/Models/TestDomain2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Models')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Models/TestDomain.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Models/TestDomain2.php')))->toBeTrue();
});

it('creates a new design structure class correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' => '/Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
            [
                'path' => '/Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass2',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php')))->toBeTrue();
});

it('creates a new design structure class with leading slash correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' => 'Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
            [
                'path' => 'Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass2.php')))->toBeTrue();
});

it('creates a new design structure abstract class correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' => '/Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
            [
                'path' => '/Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php')))->toBeTrue();
});

it('creates a new design structure abstract class with leading slash correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' => 'Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
            [
                'path' => 'Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract2.php')))->toBeTrue();
});

it('creates a new design structure request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' => 'TestDomainRequest',
            ],
            [
                'name' => 'TestDomainRequest2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Requests/TestDomainRequest.php')))->toBeTrue();
});

it('creates a new design structure custom path request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' => '../../App/Http/TestDomain/Requests/TestDomainRequest',
            ],
            [
                'name' => '../../App/Http/TestDomain/Requests/TestDomainRequest2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Requests/TestDomainRequest.php')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Requests/TestDomainRequest2.php')))->toBeTrue();
});

it('creates a new design structure interfaces correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' => '/Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ],
            [
                'path' => '/Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php')))->toBeTrue();
});

it('creates a new design structure interfaces without leading slash correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' => 'Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ],
            [
                'path' => 'Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface2.php')))->toBeTrue();
});

it('creates a new design structure controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' => 'TestDomainController',
            ],
            [
                'name' => 'TestDomainController2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestDomainController2.php')))->toBeTrue();
});

it('creates a new design structure controller with resources correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' => 'TestDomainController',
                'is_resource' => true,
            ],
            [
                'name' => 'TestDomainController2',
                'is_resource' => true,
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestDomainController2.php')))->toBeTrue();
});

it('creates a new design structure api controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' => 'TestDomainController',
                'is_api' => true,
            ],
            [
                'name' => 'TestDomainController2',
                'is_api' => true,
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Controllers/TestDomainController2.php')))->toBeTrue();
});

it('creates a new design structure custom path controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' => '../../App/Http/TestDomain/Controllers/TestDomainController',
            ],
            [
                'name' => '../../App/Http/TestDomain/Controllers/TestDomainController2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Controllers/TestDomainController.php')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Controllers/TestDomainController2.php')))->toBeTrue();
});

it('creates a new design structure resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' => 'TestDomainResource',
            ],
            [
                'name' => 'TestDomainResource2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Resources/TestDomainResource.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Resources/TestDomainResource2.php')))->toBeTrue();
});

it('creates a new design structure custom path resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' => '../../App/Http/TestDomain/Resources/TestDomainResource',
            ],
            [
                'name' => '../../App/Http/TestDomain/Resources/TestDomainResource2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Resources/TestDomainResource.php')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Resources/TestDomainResource2.php')))->toBeTrue();
});

it('creates a new design structure middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' => 'TestDomainMiddleware',
            ],
            [
                'name' => 'TestDomainMiddleware2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Middleware/TestDomainMiddleware.php')))->toBeTrue()
        ->and(File::exists(base_path('app/Http/Middleware/TestDomainMiddleware2.php')))->toBeTrue();
});

it('creates a new design structure custom path middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' => '../../App/Http/TestDomain/Middlewares/TestDomainMiddleware',
            ],
            [
                'name' => '../../App/Http/TestDomain/Middlewares/TestDomainMiddleware2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Middlewares')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Middlewares/TestDomainMiddleware2.php')))->toBeTrue();
});

it('creates a new design structure vue composition api component correctly', function () {
    //Arrange
    $config = [
        'vue_components' => [
            [
                'name' => 'TestVue',
                'path' => 'js/Pages',
            ],
            [
                'name' => 'TestVue2',
                'path' => 'js/Pages',
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue2.vue')))->toBeTrue();
});

it('creates a new design structure vue options api component correctly', function () {
    //Arrange
    $config = [
        'vue_components' => [
            [
                'name' => 'TestVue',
                'path' => 'js/Pages',
                'component_type' => 'options',
            ],
            [
                'name' => 'TestVue2',
                'path' => 'js/Pages',
                'component_type' => 'options',
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue2.vue')))->toBeTrue();
});

it('creates a new design structure react component correctly', function () {
    //Arrange
    $config = [
        'react_components' => [
            [
                'name' => 'TestReact',
                'path' => 'js/Pages',
            ],
            [
                'name' => 'TestReact2',
                'path' => 'js/Pages',
            ]
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestReact.jsx')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestReact2.jsx')))->toBeTrue();
});
