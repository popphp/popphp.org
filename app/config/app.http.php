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
            ]
        ],
        '*' => [
            'controller' => 'App\Controller\IndexController',
            'action'     => 'error'
        ]
    ]
];
