<?php declare(strict_types=1);

// all paths are relative to the modules/module_name folder
return [
    'rootNamespace' => 'Platform',
    'moduleFolderName' => 'modules',
    'srcFolderName' => 'src',
    'namespaces' => [
        'casts' => '\Domain\Casts',
        'channel' => '\Channels',
        'command' => '\Console',
        'config' => '',
        'controller' => '\Http\Controllers',
        'event' => 'Events',
        'exception' => '\Exceptions',
        'factory' => '/database/factories',
        'job' => '\Services',
        'listener' => '\Listeners',
        'mail' => 'resources\email',
        'middleware' => '\Http\Middleware',
        'migration' => '/database/migrations',
        'model' => '\Domain\Models',
        'notification' => '\Notifications',
        'observer' => '\Domain\Observers',
        'policy' => '\Policies',
        'provider' => '\Providers',
        'request' => '\Presentation\Requests',
        'resource' => '\Resources',
        'route' => '',
        'rule' => '\Rules',
        'scope' => '\Domain\Builders',
        'seeder' => '/database/seeders',
        'test_feature' => '\tests\feature',
        'test_unit' => '\tests\unit',
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
            'feature' => [],
            'unit' => [],
        ],
        'src' => [
            'Actions' => [],
            'Services' => [],
            'Domain' => [
                'Models' => [],
            ],
            'Http' => [
                'Controllers' => [],
            ],
        ],
    ],
];
