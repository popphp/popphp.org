<?php

namespace App\Http\Controller;

use App\Exception;

class IndexController extends AbstractController
{

    /**
     * Index action
     *
     * @return void
     */
    public function index(): void
    {
        $this->renderPage('index.phtml', 'No magic. Just PHP.', 'home');
    }

    /**
     * Why Pop action
     *
     * @return void
     */
    public function whyPop(): void
    {
        $this->renderPage('why-pop.phtml', 'Why Pop', 'why-pop');
    }

    /**
     * Features action
     *
     * @return void
     */
    public function features(): void
    {
        $this->renderPage('features.phtml', 'Features', 'features');
    }

    /**
     * Components action
     *
     * @return void
     */
    public function components(): void
    {
        $this->prepareView('components.phtml');
        $this->view->title      = 'Components';
        $this->view->page       = 'components';
        $this->view->components = include __DIR__ . '/../../../config/components.php';
        $this->send();
    }

    /**
     * Docs action
     *
     * @return void
     */
    public function docs(): void
    {
        $this->renderPage('docs.phtml', 'Documentation', 'docs');
    }

    /**
     * Community action
     *
     * @return void
     */
    public function community(): void
    {
        $this->renderPage('community.phtml', 'Community', 'community');
    }

    /**
     * Get started action
     *
     * @return void
     */
    public function getStarted(): void
    {
        $this->renderPage('get-started.phtml', 'Get started', 'get-started');
    }

    /**
     * Error action
     *
     * @param  int     $code
     * @param  ?string $message
     * @return void
     */
    public function error(int $code = 404, ?string $message = null): void
    {
        $this->prepareView('error.phtml');
        $this->view->title = $code . ' ' . ($message ?? \Pop\Http\Server\Response::getMessageFromCode($code));
        $this->view->page  = null;
        $this->view->code  = $code;
        $this->send($code);
    }

    /**
     * Maintenance action
     *
     * @param  int     $code
     * @param  ?string $message
     * @return void
     */
    public function maintenance(int $code = 503, ?string $message = null): void
    {
        $this->prepareView('maintenance.phtml');
        $this->view->title = 'Website is Down';
        $this->view->page  = null;
        $this->send($code);
    }

    /**
     * Render a static marketing page
     *
     * @param  string $template
     * @param  string $title
     * @param  string $page
     * @return void
     */
    protected function renderPage(string $template, string $title, string $page): void
    {
        $this->prepareView($template);
        $this->view->title = $title;
        $this->view->page  = $page;
        $this->send();
    }

}
