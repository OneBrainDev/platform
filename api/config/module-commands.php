<?php declare(strict_types=1);

// all paths are relative to the modules/module_name folder
return [
    'rootNamespace' => 'Platform',
    'moduleFolderName' => 'modules',
    'srcFolderName' => 'src',
    'namespaces' => [
        'casts' => '\Domain\Casts',
        'channel' => 'Application\Services\Broadcasts',
        'command' => '\Presentation\Console',
        'config' => '',
        'controller' => '\Presentation\Controllers',
        'event' => '\Application\Broadcasts\Events',
        'exception' => '\Infrastructure\Exceptions',
        'factory' => 'database\factories',
        'job' => '\Application\Services\Jobs',
        'listener' => '\Application\Handlers\EventListeners',
        'mail' => 'resources\email',
        'middleware' => '\Presentation\Middleware',
        'migration' => 'database\migrations',
        'model' => '\Domain\Models',
        'notification' => '\Application\Broadcasts\Notifications',
        'observer' => '\Domain\Observers',
        'policy' => '\Infrastructure\Policies',
        'provider' => '\Infrastructure\Providers',
        'request' => '\Infrastructure\Requests',
        'resource' => '\Infrastructure\Resources',
        'route' => '',
        'rule' => '\Infrastructure\Rules',
        'scope' => '\Domain\QueryBuilders\Scopes',
        'seeder' => 'database\Seeders',
        'test_feature' => '\Tests\Feature',
        'test_unit' => '\Tests\Unit',
    ],
    'files' => [
        'composer' => 'composer.json',
        'routes' => '{{module}}.routes.php',
        'config' => '{{module}}.config.php',
    ],
    'structure' => [
        'database' => [
            'factories' => [],
            'migrations' => [],
            'seeders' => [],
        ],
        'resources' => [
            'mail' => [],
            'views' => [],
        ],
        'tests' => [
            'Feature' => [],
            'Unit' => [],
        ],
        '{{src}}' => [
            'Application' => [
                'Broadcasts' => [
                    'Channels' => [],
                    'Commands' => [],
                    'Events' => [],
                    'Notifications' => []
                ],
                'Handlers' => [
                    'CommandHandlers' => [],
                    'EventListeners' => [],
                ],
                'Services' => [
                    'Actions' => [],
                    'Jobs' => [],
                    'Queries' => [],
                ],
            ],
            'Domain' => [
                'Casts' => [],
                'Collections' => [],
                'DataObjects' => [],
                'Models' => [],
                'Observers' => [],
                'QueryBuilders' => [
                    'Scopes' => []
                ],
                'Repositories' => [],
                'ValueObjects' => [],
            ],
            'Infrastructure' => [
                'Exceptions' => [],
                'Policies' => [],
                'Providers' => [],
                'Requests' => [],
                'Resources' => [],
                'Rules' => [],
            ],
            'Presentation' => [
                'Console' => [],
                'Controllers' => [],
                'Middleware' => [],
            ],
        ],
    ],
];
