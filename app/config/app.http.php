<?php

return [
    'routes' => [
        'get' => [
            '[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'index'
            ],
            '/overview[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'overview'
            ],
            '/documentation[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'documentation'
            ],
            '/development[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'development'
            ],
            '/version[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'version'
            ],
            '/license[/]' => [
                'controller' => 'App\Controller\IndexController',
                'action'     => 'license'
            ]
        ],
        '*' => [
            'controller' => 'App\Controller\IndexController',
            'action'     => 'error'
        ]
    ],
    'version' => '3.6.1'
];
