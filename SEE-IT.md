See it for yourself
-------------------

There are a few options to wire up and run a Pop PHP application.

Route by config (Code Block)
============================

return [
    'routes' => [
        'get' => [
            '/hello[/:name]' => [
                'controller' => IndexController::class,
                'action'     => 'index'
            ],
        ],
        'post' => [
            '/users[/]' => [
                'controller' => UsersController::class,
                'action'     => 'create'
            ],
        ],
        '*' => [
            '*' => [
                'controller' => IndexController::class,
                'action'     => 'error'
            ]
        ]
    ],
];

or route fluently  (Code Block)
===============================

$app->get('/hello[/:name]', 'IndexController->index')
    ->post('/users[/]', 'UsersController->create');

Build your dispatchable controller (Code Block)
===============================================

use Pop\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index(?string $name = null): void
    {
        $this->response->setBody(
            'Hello ' . ($name ?? 'World')
        );
        $this->response->send();
    }
}


Run the app  (Code Block)
=========================

$app->run();


See it in action: (bash screen style block)
===========================================

curl http://localhost:8000/hello/Nick

Hello Nick
