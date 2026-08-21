<?php
/**
 * HTTP application config
 *
 * Routes are explicit: one entry per page, one controller action per page.
 * The route table doubles as the sitemap.
 */

return [
    'routes' => [
        '[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'index'
        ],
        '/why-pop[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'whyPop'
        ],
        '/features[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'features'
        ],
        '/components[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'components'
        ],
        '/get-started[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'getStarted'
        ],
        '/api[/]' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'index'
        ],
        '*' => [
            'controller' => 'App\Http\Controller\IndexController',
            'action'     => 'error'
        ]
    ],
    'http_options_headers' => [
        'Access-Control-Allow-Origin'  => '*',
        'Access-Control-Allow-Headers' => 'Accept, Authorization, Content-Type',
        'Access-Control-Allow-Methods' => 'HEAD, OPTIONS, GET, PUT, POST, PATCH, DELETE',
        'Content-Type'                 => 'application/json'
    ]
];
