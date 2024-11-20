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

Once the configuration file is ready, if you are using the laravel-design configuration file run:

```bash
php artisan make:design
```
Otherwise, if you are using your own configuration file:

```bash
php artisan make:design {your_config_name}
```
________________________________
## Configurations
### Classes

```
'classes' => [
   [
       'name' =>'UserService',
       'namespace' => '/Domains/User/Domain/Services',
   ]
]
```

### Interfaces

```
'interfaces' => [
   [
       'name' =>'UserServiceInterface',
       'namespace' => '/Domains/User/Domain/Contracts',
   ]
]
```

### Abstract Classes

```
'abstarct_classes' => [
   [
       'name' =>'UserServiceAbstract',
       'namespace' => '/Domains/User/Domain/Contracts',
   ]
]
```

### Models
Creating a model with the laravel default namespace:
```
'models' => [
   [
       'name' =>'User',
   ]
]
```

Creating a model with custom namespace:
```
'models' => [
   [
       'name' =>'/Domains/User/Domain/Models/User',
   ]
]
```

### Controllers
Creating a controller with the laravel default namespace:
```
'controllers' => [
   [
       'name' =>'UserController',
   ]
]
```
Creating a controller with custom namespace:
```
'controllers' => [
   [
       'name' =>'../../App/Http/User/Controllers/UserController',
   ]
]
```
You can create Controllers with resources (with index, create edit, show, destroy, store and update methods), configure the file as follows:
```
'controllers' => [
   [
       'name' =>'TestDomainController',
       'is_resource' => true,
   ],
]
```

You can also create api Controllers (with index, show, destroy, store and update methods), configure the file as follows:
```
'controllers' => [
   [
       'name' =>'TestDomainController',
       'is_api' => true,
   ],
]
```

### Requests
Creating a request with the laravel default namespace:
```
'requests' => [
   [
       'name' =>'UserRequest',
   ]
]
```
Creating a request with custom namespace:
```
'requests' => [
   [
       'name' =>'../../App/Http/User/Requests/UserRequest',
   ]
]
```

### Middlewares
Creating a middleware with the laravel default namespace:
```
'requests' => [
   [
       'name' =>'UserMiddleware',
   ]
]
```
Creating a middleware with custom namespace:
```
'requests' => [
   [
       'name' =>'../../App/Http/User/Middlewares/UserMiddleware',
   ]
]
```

### Resources
Creating a resource with the laravel default namespace:
```
'requests' => [
   [
       'name' =>'UserResource',
   ]
]
```
Creating a resource with custom namespace:
```
'requests' => [
   [
       'name' =>'../../App/Http/User/Resources/UserResource',
   ]
]
```

### Vue Components
For Vue components, the default is the Composition API. If you want to create the component using the Options API, configure the file as follows:
```
'vue_components' => [
    [
        'name' => 'UserPage',
        'namespace' => 'js/Pages/User',
        'component_type' => 'options',
    ]
]
```

### React Components
```
'react_components' => [
    [
        'name' => 'UserPage',
        'namespace' => 'js/Pages/User',
        'component_type' => 'options',
    ]
]
```

### Blade Components
```
'blade' => [
    [
        'name' => 'UserPage',
    ]
]
```

## Laravel Commands
Add ```../../``` before the namespace where you want to create the class; otherwise, the class will be created following Laravel's default namespace. For example, for the Controller: ```name => ../../App/Http/TestDomain/Controllers/TestDomainController```, the Controller will be created in ```app/App/Http/TestDomain/Controllers/TestDomainController```. On the other hand, if we use ```name => TestDomainController```, it will be created in ```app/Http/Controllers/TestDomainController```.
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