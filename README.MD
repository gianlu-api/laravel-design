# Laravel Design

![badge](https://github.com/gianlu-api/laravel-design/actions/workflows/tests.yml/badge.svg)&nbsp;&nbsp;&nbsp;
![badge](https://github.com/gianlu-api/laravel-design/actions/workflows/larastan.yml/badge.svg)

Laravel Design is the library that allows you to quickly generate the architecture you desire.

## Requirements

- PHP ^8.1
- Laravel ^10 || ^11

## Installation
```bash
composer require gianlu-api/laravel-design
```

## Publish Resources
```bash
php artisan vendor:publish --tag=gianlu-api:laravel-design:config
```
It is not mandatory to publish the config; you can create your own and specify it when running the command.

## Usage

First, you will need to fill out the configuration as explained below. Once the configuration file is ready, if you are using the laravel-design configuration file run:

```bash
php artisan make:design
```
Otherwise, if you are using your own configuration file:

```bash
php artisan make:design {your_config_name}
```
________________________________
## Configurations

it is possible to generate the following types of files:
 - migrations => ```'migrations'```
 - classes => ```'classes'```
 - interfaces => ```'interfaces'```
 - abstract classes => ```'abstract_classes'```
 - models => ```'models'```
 - controllers => ```'controllers'```
   * options: type
 - requests => ```'requests'```
 - middlewares => ```'middlewares'```
 - vue components => ```'vue_components'```
   * options: type
 - react components => ```'react_components'```
 - blade components => ```'blade_views'```

### you can choose between these types of configuration, you can also mix them if you need

- name and path configuration
```
'key' => [
   [
       'name' =>'UserService',
       'path' => '/Domains/User/Domain/Services',
   ]
]
```
```
'key' => [
    'name' =>'UserService',
    'path' => '/Domains/User/Domain/Services',
]
```
- path and names configuration
```
'key' => [
    'path' => '/Domains/User/Domain/Services',
    'names' => [
        'UserRetrieverService',
        'UserDataAccessService',
    ]
]
```
```
'key' => [
    [
        'path' => '/Domains/User/Domain/Services',
        'names' => [
            'UserRetrieverService',
            'UserDataAccessService',
        ]
    ],
    [
        'path' => '/Domains/User/Domain/Dtos',
        'names' => [
            'CreateUserData',
            'UpdateUserData',
        ]
    ]
]
```
- name configuration
```
'key' => [
    'name' =>'/Domains/User/Domain/Services/UserService',
]
```
- mixed configuration example
```
'classes' => [
     [
       'name' =>'UserType',
       'path' => '/Domains/User/Domain/Enums',
    ],
    [
        'path' => '/Domains/User/Domain/Services',
        'names' => [
            'UserRetrieverService',
            'UserDataAccessService',
        ]
    ],
    [
        'path' => '/Domains/User/Domain/Dtos',
        'names' => [
            'CreateUserData',
            'UpdateUserData',
        ]
    ]
    'name' =>'/Domains/User/Domain/Repositories/UserRepository',
]
```
## Migrations configruration

```
'migrations' => [
    'table' => 'test_domain',
]
```
```
'migrations' => [
    'tables' => ['test_domain', 'test_domain_2']
]
```
## Controllers configruration
it is possible for controllers to choose whether api or resource methods should be created as allowed by Laravel, by adding to the configuration array ```'type' => api``` for api or ```type => resource``` for resources
```
'controllers' => [
    [
       'name' =>'UserType',
       'path' => '/Domains/User/Domain/Enums',
       'type' => 'api'
    ],
]
```
```
'controllers' => [
    [
       'name' =>'UserType',
       'path' => '/Domains/User/Domain/Enums',
       'type' => 'resource'
    ],
]
```
if you want an empty controller, you can skip the type field
```
'controllers' => [
    [
       'name' =>'UserType',
       'path' => '/Domains/User/Domain/Enums',
    ],
]
```
## Vue Components Configuration
it is possible for vue components to choose options between composition_api ```'type' => 'compositions'``` and ```'type' => 'options'```, by default a compositions component is created
```
'vue_components' => [
    [
       'name' =>'UserType',
       'path' => '/Domains/User/Domain/Enums',
       'type' => 'options'
    ],
]
```

## Configuration Example
First, you will need to fill out the configuration file as follows.
```
[
    "migrations" => [
        "table" => "users"
    ],
    'models' => [
        'name' => '/Domains/User/Domain/Models/User',
    ],
    "classes" => [
        [
            "path" =>"/Domains/User/Domain/Services",
            "names" => ["UserRetrieverService", "UserDataAccessService"]
        ],
        [
            "path" =>"/Domains/User/Domain/Repositories",
            "name" => "UserRepository",
        ]
    ],
    "interfaces" => [
        "path" =>"/Domains/TestDomain/User/Interfaces",
        "names" => ["UserServiceRetrieverInterface", "UserDataAccessServiceInterface", "UserRepositoryInterface"]
    ],
    "abstract_classes" => [
        [
            "path" =>"/Domains/User/Domain/Abstracts",
            "name" => "UserAbstract",
        ]
    ],
    "requests" => [
        "name" =>"../../App/Http/User/Requests/UserRequest",
    ],
    "middlewares" => [
        "name" =>"../../App/Http/User/Middlewares/UserMiddleware",
    ],
    "resources" => [
        "name" =>"../../App/Http/User/Resources/UserResource",
    ],
    "controllers" => [
        "name" =>"../../App/Http/User/Controllers/UserController",
    ],
    "blade_views" => [
         "name" => "UserPage",
    ],
    "vue_components" => [
        "name" => "UserPage",
         "path" => "js/Pages",
    ],
    "react_components" => [
        "name" => "UserPage",
        "path" => "js/Pages",
    ]
];
```

If you want to create only specific components, simply leave the unwanted arrays empty. For example, if you need to create only a migration, model, service, and repository.

```
[
    "migrations" => [
        "table" => "users"
    ],
    'models' => [
        'name' => '/Domains/User/Domain/Models/User',
    ],
    "classes" => [
        [
            "path" =>"/Domains/User/Domain/Services",
            "names" => ["UserRetrieverService", "UserDataAccessService"]
        ],
        [
            "path" =>"/Domains/User/Domain/Repositories",
            "name" => "UserRepository",
        ]
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
________________________________________________
## Laravel Commands
Add ```../../``` before the path where you want to create the class; otherwise, the class will be created following Laravel's default path. For example, for the Controller: ```name => ../../App/Http/TestDomain/Controllers/TestDomainController```, the Controller will be created in ```app/App/Http/TestDomain/Controllers/TestDomainController```. On the other hand, if we use ```name => TestDomainController```, it will be created in ```app/Http/Controllers/TestDomainController```.
________________________________________________
## Other Commands
```bash
php artisan make:class {class_name} {class_path}
```

```bash
php artisan make:interface {interface_name} {interface_path}
```

```bash
php artisan make:class:abstract {abstarct_class_name} {abstract_class_path}
```

```bash
php artisan make:view:vue {vue_component_name} {vue_component_path} {--type=options || compositions}
```
Default type for Vue components is composition api.
```bash
php artisan make:view:react {react_component_name} {react_component_path}
```
