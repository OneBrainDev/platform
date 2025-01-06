<?php declare(strict_types=1);

return [
    'root_namespace' => 'Platform',
    'module_folder' => 'modules',
    'src_folder' => 'src',
    'namespaces' => [
        'config' => 'config',
        'migration' => 'database/migrations',
        'mail' => 'resources/email',
        'factory' => 'database/factories',
        'route' => 'routes',
        'seeder' => 'database/seeders',
        'casts' => '\Domain\Casts',
        'channel' => '\Channels',
        'command' => '\Console',
        'controller' => '\Http\Controllers',
        'event' => 'Domain\Events',
        'exception' => '\Exceptions',
        'job' => '\Services',
        'listener' => '\Services',
        'middleware' => '\Http\Middleware',
        'model' => '\Domain\Models',
        'notification' => '\Services',
        'observer' => '\Domain\Observers',
        'policy' => '\Policies',
        'provider' => '\Providers',
        'request' => '\Http\Requests',
        'resource' => '\Resources',
        'rule' => '\Rules',
        'scope' => '\Domain\Builders',
        'test_feature' => '\Tests\Feature',
        'test_unit' => '\Tests\Unit',
    ],
    'files' => [
        'composer' => 'composer.json',
    ],
    'structure' => [
        'config' => [],
        'database' => [
            'factories' => [],
            'migrations' => [],
            'seeders' => [],
        ],
        'resources' => [
            'mail' => [],
        ],
        'routes' => [],
        'tests' => [
            'Feature' => [],
            'Unit' => [],
        ],
        'src' => [
            'Actions' => [],
            'Contracts' => [],
            'DataTransport' => [],
            'Domain' => [
                'Collections' => [],
                'DataObjects' => [],
                'Models' => [],
            ],
            'Http' => [
                'Controllers' => [],
                'Requests' => [],
            ],
            'Services' => [],
        ],
    ],
];
