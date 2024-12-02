<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('creates a new design structure with migration correctly', function () {
    $config = [
        'migration' => [
            'table_name' => 'test_domain',
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    $migrationFile = collect(File::files(database_path('migrations')))
        ->first(fn ($file) => str_contains($file->getFilename(), $config['migration']['table_name']));

    //Assert
    expect(File::exists(base_path('database/migrations')))->toBeTrue()
        ->and($migrationFile)->not()->toBeNull();

});

it('creates a new design structure with model correctly', function () {
    //Arrange
    $config = [
        'models' => [
            [
                'name' =>'/Domains/TestDomain/Domain/Models/TestDomain',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Models')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Models/TestDomain.php')))->toBeTrue();
});

it('creates a new design structure with class correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass.php')))->toBeTrue();
});

it('creates a new design structure with class with leading slash correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' =>'Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Classes/TestDomainClass.php')))->toBeTrue();
});

it('creates a new design structure with abstract class correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php')))->toBeTrue();
});

it('creates a new design structure with abstract class with leading slash correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' =>'Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Abstracts/TestDomainAbstract.php')))->toBeTrue();
});

it('creates a new design structure with request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' =>'TestDomainRequest',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Requests/TestDomainRequest.php')))->toBeTrue();
});

it('creates a new design structure with custom path request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' =>'../../App/Http/TestDomain/Requests/TestDomainRequest',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Requests')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Requests/TestDomainRequest.php')))->toBeTrue();
});

it('creates a new design structure with interfaces correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php')))->toBeTrue();
});

it('creates a new design structure with interfaces without leading slash correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' =>'Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    expect(File::exists(base_path('app/Domains/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/Domains/TestDomain/Domain/Interfaces/TestDomainRepositoryInterface.php')))->toBeTrue();
});

it('creates a new design structure with controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue();
});

it('creates a new design structure with controller with resources correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
                'is_resource' => true,
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue();
});

it('creates a new design structure with api controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
                'is_api' => true,
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Controllers/TestDomainController.php')))->toBeTrue();
});

it('creates a new design structure with custom path controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'../../App/Http/TestDomain/Controllers/TestDomainController',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Controllers')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Controllers/TestDomainController.php')))->toBeTrue();
});

it('creates a new design structure with resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' =>'TestDomainResource',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Resources/TestDomainResource.php')))->toBeTrue();
});

it('creates a new design structure with custom path resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' =>'../../App/Http/TestDomain/Resources/TestDomainResource',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Resources')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Resources/TestDomainResource.php')))->toBeTrue();
});

it('creates a new design structure with middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' =>'TestDomainMiddleware',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Middleware/TestDomainMiddleware.php')))->toBeTrue();
});

it('creates a new design structure with custom path middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' =>'../../App/Http/TestDomain/Middlewares/TestDomainMiddleware',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/App/Http/TestDomain')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Middlewares')))->toBeTrue()
        ->and(File::exists(base_path('app/App/Http/TestDomain/Middlewares/TestDomainMiddleware.php')))->toBeTrue();
});

it('creates a new design structure with blade view correctly', function () {
    //Arrange
    $config = [
        'blade_views' => [
            [
                'name' =>'TestBladeView',
            ],
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('views/TestBladeView.blade.php')))->toBeTrue();
});

it('creates a new design structure with vue composition api component correctly', function () {
    //Arrange
    $config = [
        'vue_components' => [
            [
                'name' => 'TestVue',
                'path' => 'js/Pages',
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();
});

it('creates a new design structure with vue options api component correctly', function () {
    //Arrange
    $config = [
        'vue_components' => [
            [
                'name' => 'TestVue',
                'path' => 'js/Pages',
                'component_type' => 'options',
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();
});


it('creates a new design structure with react component correctly', function () {
    //Arrange
    $config = [
        'react_components' => [
            [
                'name' => 'TestReact',
                'path' => 'js/Pages',
            ],
        ]
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestReact.jsx')))->toBeTrue();
});

//More Objects Tests
it('creates a new design structure with 2 model correctly', function () {
    //Arrange
    $config = [
        'models' => [
            [
                'name' =>'/Domains/TestDomain/Domain/Models/TestDomain',
            ],
            [
                'name' =>'/Domains/TestDomain/Domain/Models/TestDomain2',
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

it('creates a new design structure with 2 class correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
            [
                'path' =>'/Domains/TestDomain/Domain/Classes',
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

it('creates a new design structure with 2 class with leading slash correctly', function () {
    //Arrange
    $config = [
        'classes' => [
            [
                'path' =>'Domains/TestDomain/Domain/Classes',
                'name' => 'TestDomainClass',
            ],
            [
                'path' =>'Domains/TestDomain/Domain/Classes',
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

it('creates a new design structure with 2 abstract class correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
            [
                'path' =>'/Domains/TestDomain/Domain/Abstracts',
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

it('creates a new design structure with 2 abstract class with leading slash correctly', function () {
    //Arrange
    $config = [
        'abstract_classes' => [
            [
                'path' =>'Domains/TestDomain/Domain/Abstracts',
                'name' => 'TestDomainAbstract',
            ],
            [
                'path' =>'Domains/TestDomain/Domain/Abstracts',
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

it('creates a new design structure with 2 request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' =>'TestDomainRequest',
            ],
            [
                'name' =>'TestDomainRequest2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(base_path('app/Http/Requests/TestDomainRequest.php')))->toBeTrue();
});

it('creates a new design structure with 2 custom path request correctly', function () {
    //Arrange
    $config = [
        'requests' => [
            [
                'name' =>'../../App/Http/TestDomain/Requests/TestDomainRequest',
            ],
            [
                'name' =>'../../App/Http/TestDomain/Requests/TestDomainRequest2',
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

it('creates a new design structure with 2 interfaces correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' =>'/Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ],
            [
                'path' =>'/Domains/TestDomain/Domain/Interfaces',
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

it('creates a new design structure with 2 interfaces without leading slash correctly', function () {
    //Arrange
    $config = [
        'interfaces' => [
            [
                'path' =>'Domains/TestDomain/Domain/Interfaces',
                'name' => 'TestDomainRepositoryInterface',
            ],
            [
                'path' =>'Domains/TestDomain/Domain/Interfaces',
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

it('creates a new design structure with 2 controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
            ],
            [
                'name' =>'TestDomainController2',
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

it('creates a new design structure with 2 controller with resources correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
                'is_resource' => true,
            ],
            [
                'name' =>'TestDomainController2',
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

it('creates a new design structure with 2 api controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'TestDomainController',
                'is_api' => true,
            ],
            [
                'name' =>'TestDomainController2',
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

it('creates a new design structure with 2 custom path controller correctly', function () {
    //Arrange
    $config = [
        'controllers' => [
            [
                'name' =>'../../App/Http/TestDomain/Controllers/TestDomainController',
            ],
            [
                'name' =>'../../App/Http/TestDomain/Controllers/TestDomainController2',
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

it('creates a new design structure with 2 resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' =>'TestDomainResource',
            ],
            [
                'name' =>'TestDomainResource2',
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

it('creates a new design structure with 2 custom path resource correctly', function () {
    //Arrange
    $config = [
        'resources' => [
            [
                'name' =>'../../App/Http/TestDomain/Resources/TestDomainResource',
            ],
            [
                'name' =>'../../App/Http/TestDomain/Resources/TestDomainResource2',
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

it('creates a new design structure with 2 middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' =>'TestDomainMiddleware',
            ],
            [
                'name' =>'TestDomainMiddleware2',
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

it('creates a new design structure with 2 custom path middleware correctly', function () {
    //Arrange
    $config = [
        'middlewares' => [
            [
                'name' =>'../../App/Http/TestDomain/Middlewares/TestDomainMiddleware',
            ],
            [
                'name' =>'../../App/Http/TestDomain/Middlewares/TestDomainMiddleware2',
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

it('creates a new design structure with 2 blade view correctly', function () {
    //Arrange
    $config = [
        'blade_views' => [
            [
                'name' =>'TestBladeView',
            ],
            [
                'name' =>'TestBladeView2',
            ]
        ],
    ];

    $this->setConfig($config);

    //Act
    $this->artisan('make:design')->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('views/TestBladeView.blade.php')))->toBeTrue()
        ->and(File::exists(resource_path('views/TestBladeView2.blade.php')))->toBeTrue();
});

it('creates a new design structure with 2 vue composition api component correctly', function () {
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

it('creates a new design structure with 2 vue options api component correctly', function () {
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


it('creates a new design structure with 2 react component correctly', function () {
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

