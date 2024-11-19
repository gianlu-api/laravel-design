# Laravel Design

Laravel Design is the library that allows you, through a command and a configuration file where you specify the architecture you want for your project, to quickly generate the architecture you desire.

## Requirements

- PHP ^8.1
- Laravel ^10 || ^11

## Installation
```bash
composer require gianlu-api/laravel-design --dev
```

## Publish Resources
```bash
php artisan vendor:publish --tag=gianlu-api:laravel-design:config
```
It is not mandatory to publish the config; you can create your own and specify it when running the command.

## Usage

First, you will need to fill out the configuration file as follows.
```
[
    "migrations" => [
        "tables" => [
            "name" => "users",
        ]
    ],
    'models' => [
        [
            'name' => '/Domains/User/Domain/Models/User',
        ]
    ],
    "classes" => [
        [
            "namespace" =>"/Domains/User/Domain/Services",
            "name" => "UserService",
        ],
        [
            "namespace" =>"/Domains/User/Domain/Repositories",
            "name" => "UserRepository",
        ]
    ],
    "interfaces" => [
        [
            "namespace" =>"/Domains/TestDomain/User/Interfaces",
            "name" => "UserServiceInterface",
        ],
        [
            "namespace" =>"/Domains/User/Domain/Interfaces",
            "name" => "UserRepositoryInterface",
        ]
    ],
    "abstract_classes" => [
        [
            "namespace" =>"/Domains/User/Domain/Abstracts",
            "name" => "UserAbstract",
        ]
    ],
    "requests" => [
        [
            "name" =>"../../App/Http/User/Requests/UserRequest",
        ]
    ],
    "middlewares" => [
        [
            "name" =>"../../App/Http/User/Middlewares/UserMiddleware",
        ]
    ],
    "resources" => [
        [
            "name" =>"../../App/Http/User/Resources/UserResource",
        ]
    ],
    "controllers" => [
        [
            "name" =>"../../App/Http/User/Controllers/UserController",
        ]
    ],
    "blade_views" => [
        [
            "name" => "UserPage",
        ]
    ],
    "vue_components" => [
        [
            "name" => "UserPage",
            "namespace" => "js/Pages",
        ]
    ],
    "react_components" => [
        [
            "name" => "UserPage",
            "namespace" => "js/Pages",
        ]
    ]
];
```

For Laravel's native commands, add ```../../``` before the namespace where you want to create the class; otherwise, the class will be created following Laravel's default namespace. For example, for the Controller: ```name => ../../App/Http/TestDomain/Controllers/TestDomainController```, the Controller will be created in ```app/App/Http/TestDomain/Controllers/TestDomainController```. On the other hand, if we use ```name => TestDomainController```, it will be created in ```app/Http/Controllers/TestDomainController```.

If you want to create only specific components, simply leave the unwanted arrays empty. For example, if you need to create only a migration, model, service, and repository.

```
[
    "migrations" => [
        "tables" => [
            "name" => "users",
        ],
    ],
    'models' => [
        [
            'name' => '/Domains/User/Domain/Models/User',
        ]
    ],
    "classes" => [
        [
            "namespace" =>"/Domains/User/Domain/Services",
            "name" => "UserService",
        ],
        [
            "namespace" =>"/Domains/User/Domain/Repositories",
            "name" => "UserRepository",
        ],
    ],
    "interfaces" => [],
    "abstract_classes" => [],
    "requests" => [],
    "middlewares" => [],
    "resources" => [],
    "controllers" => [],
    "blade_views" => [],
    "vue_components" => [],
    "react_components" => []
];
```
For Vue components, the default is the Composition API. If you want to create the component using the Options API, configure the file as follows:
```
'vue_components' => [
    [
        'name' => 'VueComponent',
        'namespace' => 'js/Pages',
        'component_type' => 'options',
    ]
]
```
Once the configuration file is ready, if you are using the laravel-design configuration file run:

```bash
php artisan make:design
```
Otherwise, if you are using your own configuration file:

```bash
php artisan make:design {your_config_name}
```
## Other Commands
```bash
php artisan make:class {class_name} {class_namespace}
```

```bash
php artisan make:interface {interface_name} {interface_namespace}
```

```bash
php artisan make:class:abstract {abstarct_class_name} {abstract_class_namespace}
```

```bash
php artisan make:vue {vue_component_name} {vue_component_namespace} {--type=options || compositions}
```
Default type for Vue components is composition api.
```bash
php artisan make:react {react_component_name} {react_component_namespace}
```