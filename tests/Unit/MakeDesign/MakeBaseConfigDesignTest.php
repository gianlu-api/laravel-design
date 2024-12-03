<?php declare( strict_types=1 );

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
        ->first(fn($file) => str_contains($file->getFilename(), $config['migration']['table_name']));

    //Assert
    expect(File::exists(base_path('database/migrations')))->toBeTrue()
        ->and($migrationFile)->not()->toBeNull();

});

it('creates a new design structure with model correctly', function () {
    //Arrange
    $config = [
        'models' => [
            [
                'name' => '/Domains/TestDomain/Domain/Models/TestDomain',
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
                'path' => '/Domains/TestDomain/Domain/Classes',
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
                'path' => 'Domains/TestDomain/Domain/Classes',
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
                'path' => '/Domains/TestDomain/Domain/Abstracts',
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
                'path' => 'Domains/TestDomain/Domain/Abstracts',
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
                'name' => 'TestDomainRequest',
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
                'name' => '../../App/Http/TestDomain/Requests/TestDomainRequest',
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
                'path' => '/Domains/TestDomain/Domain/Interfaces',
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
                'path' => 'Domains/TestDomain/Domain/Interfaces',
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
                'name' => 'TestDomainController',
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
                'name' => 'TestDomainController',
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
                'name' => 'TestDomainController',
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
                'name' => '../../App/Http/TestDomain/Controllers/TestDomainController',
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
                'name' => 'TestDomainResource',
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
                'name' => '../../App/Http/TestDomain/Resources/TestDomainResource',
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
                'name' => 'TestDomainMiddleware',
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
                'name' => '../../App/Http/TestDomain/Middlewares/TestDomainMiddleware',
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
                'name' => 'TestBladeView',
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
