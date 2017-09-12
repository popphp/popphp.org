<?php

namespace App\Controller;

use Pop\Application;
use Pop\Http\Request;
use Pop\Http\Response;
use Pop\View\View;

abstract class AbstractController extends \Pop\Controller\AbstractController
{

    /**
     * Application object
     * @var Application
     */
    protected $application = null;

    /**
     * Request object
     * @var Request
     */
    protected $request = null;

    /**
     * Response object
     * @var Response
     */
    protected $response = null;

    /**
     * View path
     * @var string
     */
    protected $viewPath = __DIR__ . '/../../view';

    /**
     * View object
     * @var \Pop\View\View
     */
    protected $view = null;

    /**
     * Constructor for the controller
     *
     * @param  Application $application
     * @param  Request     $request
     * @param  Response    $response
     */
    public function __construct(Application $application, Request $request, Response $response)
    {
        $this->application = $application;
        $this->request     = $request;
        $this->response    = $response;
    }

    /**
     * Get application object
     *
     * @return Application
     */
    public function application()
    {
        return $this->application;
    }

    /**
     * Get request object
     *
     * @return Request
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * Get response object
     *
     * @return Response
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * Get view object
     *
     * @return View
     */
    public function view()
    {
        return $this->view;
    }

    /**
     * Determine if the view object has been created
     *
     * @return boolean
     */
    public function hasView()
    {
        return (null !== $this->view);
    }

    /**
     * Send response
     *
     * @param  string $body
     * @param  int    $code
     * @param  string $message
     * @param  array  $headers
     * @return void
     */
    public function send($body = null, $code = 200, $message = null, array $headers = null)
    {
        $this->application->trigger('app.send.pre', ['controller' => $this]);

        if ((null === $body) && (null !== $this->view)) {
            $body = $this->view->render();
        }

        if (null !== $message) {
            $this->response->setMessage($message);
        }

        $this->response->setCode($code);

        if (null === $this->response->getHeader('Content-Type')) {
            $this->response->setHeader('Content-Type', 'text/html');
        }

        $this->response->setBody($body . PHP_EOL . PHP_EOL);

        $this->application->trigger('app.send.post', ['controller' => $this]);

        $this->response->send(null, $headers);
    }


    /**
     * Error handler method
     *
     * @return void
     */
    public function error()
    {
        $response = ['code' => 404, 'message' => 'Not Found'];

        $this->prepareView('error.phtml');
        $this->view->title    = 'Error: ' .  $response['code'] . ' ' . $response['message'];
        $this->view->response = $response;
        $this->send(null, 404);
        exit();
    }

    /**
     * Redirect response
     *
     * @param  string $url
     * @param  string $code
     * @param  string $version
     * @return void
     */
    public function redirect($url, $code = '302', $version = '1.1')
    {
        Response::redirect($url, $code, $version);
        exit();
    }

    /**
     * Prepare view
     *
     * @param  string $template
     * @return void
     */
    protected function prepareView($template)
    {
        $this->view = new View($this->viewPath . '/' . $template);
    }

}