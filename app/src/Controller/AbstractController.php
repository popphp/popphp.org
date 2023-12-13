<?php

namespace App\Controller;

use Pop\Application;
use Pop\Http\Server\Request;
use Pop\Http\Server\Response;
use Pop\View\View;

abstract class AbstractController extends \Pop\Controller\AbstractController
{

    /**
     * Application object
     * @var Application
     */
    protected ?Application $application = null;

    /**
     * Request object
     * @var ?Request
     */
    protected ?Request $request = null;

    /**
     * Response object
     * @var ?Response
     */
    protected ?Response $response = null;

    /**
     * View path
     * @var string
     */
    protected string $viewPath = __DIR__ . '/../../view';

    /**
     * View object
     * @var ?View
     */
    protected ?View $view = null;

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
    public function application(): Application
    {
        return $this->application;
    }

    /**
     * Get request object
     *
     * @return Request
     */
    public function request(): Request
    {
        return $this->request;
    }

    /**
     * Get response object
     *
     * @return Response
     */
    public function response(): Response
    {
        return $this->response;
    }

    /**
     * Get view object
     *
     * @return View
     */
    public function view(): View
    {
        return $this->view;
    }

    /**
     * Determine if the view object has been created
     *
     * @return bool
     */
    public function hasView(): bool
    {
        return (null !== $this->view);
    }

    /**
     * Send response
     *
     * @param  ?string $body
     * @param  int     $code
     * @param  ?string $message
     * @param  ?array  $headers
     * @return void
     */
    public function send(?string $body = null, int $code = 200, ?string $message = null, ?array $headers = null): void
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
            $this->response->addHeader('Content-Type', 'text/html');
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
    public function error(): void
    {
        $response = ['code' => 404, 'message' => 'Not Found'];

        $this->prepareView('error.phtml');
        $this->view->title    = 'Error: ' .  $response['code'] . ' ' . $response['message'];
        $this->view->response = $response;
        $this->send(null, 404);
        exit();
    }

    /**
     * Maintenance handler method
     *
     * @return void
     */
    public function maintenance(): void
    {
        $response = ['code' => 503, 'message' => 'Service Unavailable'];

        $this->prepareView('maintenance.phtml');
        $this->view->title    = 'Error: ' .  $response['code'] . ' ' . $response['message'];
        $this->view->response = $response;
        $this->send(null, 503);
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
    public function redirect(string $url, string $code = '302', string $version = '1.1'): void
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
    protected function prepareView(string $template): void
    {
        $this->view = new View($this->viewPath . '/' . $template);
        $this->view->version = $this->application->config['version'];
    }

}
