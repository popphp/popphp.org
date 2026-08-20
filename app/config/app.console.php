<?php

return [
    'routes' => [
        'help' => [
            'controller' => 'App\Console\Controller\ConsoleController',
            'action'     => 'help',
            'help'       => 'Show the help screen'
        ],
        '*'    => [
            'controller' => 'App\Console\Controller\ConsoleController',
            'action'     => 'error'
        ]
    ],

];
