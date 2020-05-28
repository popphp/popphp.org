<?php
namespace App;

use Pop\Application;
use Pop\Http\Server\Request;
use Pop\Http\Server\Response;
use Pop\View\View;

class Module extends \Pop\Module\Module
{

    /**
     * Module name
     * @var string
     */
    protected $name = 'popphp';

    public function register(Application $application)
    {
        parent::register($application);

        if (null !== $this->application->router()) {
            $this->application->router()->addControllerParams(
                '*', [
                    'application' => $this->application,
                    'request'     => new Request(),
                    'response'    => new Response()
                ]
            );
        }

        return $this;
    }

    /**
     * Custom error handler method
     *
     * @param  \Exception $exception
     * @return void
     */
    public function error(\Exception $exception)
    {
        $response = new Response();
        $message  = $exception->getMessage();

        $view          = new View(__DIR__ . '/../view/exception.phtml');
        $view->title   = 'Error';
        $view->message = $message;
        $response->addHeader('Content-Type', 'text/html');
        $response->setBody($view->render());

        $response->send(500);
    }

}