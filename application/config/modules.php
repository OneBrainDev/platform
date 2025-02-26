<?php declare(strict_types=1);

return [
    'root_namespace' => 'Platform',
    'module_folder' => 'modules',
    'src_folder' => 'src',
    'namespaces' => [
        'config' => 'config',
        'migration' => 'database/migrations',
        'mail' => 'resources/email',
        'factory' => '\Database\Factories',
        'route' => 'routes',
        'seeder' => '\Database\Seeders',
        'casts' => '\Domain\Casts',
        'channel' => '\Channels',
        'command' => '\Presentation\Console\Commands',
        'controller' => '\Presentation\Http\Controllers',
        'event' => '\Domain\Events',
        'exception' => '\Exceptions',
        'job' => '\Services\Jobs',
        'listener' => '\Services\Listeners',
        'middleware' => '\Presentation\Http\Middleware',
        'model' => '\Domain\Models',
        'notification' => '\Services\Notifications',
        'observer' => '\Domain\Observers',
        'policy' => '\Domain\Policies',
        'provider' => '\Providers',
        'request' => '\Presentation\Http\Requests',
        'resource' => '\Presentation\Resources',
        'rule' => '\Domain\Rules',
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
            'migrations' => [
                'primary' => [],
                'tenant' => [],
            ],
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
            'Contracts' => [],
            'DataObjects' => [],
            'Domain' => [
                'Actions' => [],
                'Collections' => [],
                'Models' => [],
                'ValueObjects' => [],
            ],
            'Presentation' => [
                'Http' => [
                    'Controllers' => [],
                    'Requests' => [],
                ],
                'Console' => [],
            ],
            'Services' => [],
        ],
    ],
];
