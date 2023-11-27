<?php

namespace App\Controller;

class IndexController extends AbstractController
{

    public function index(): void
    {
        $this->prepareView('index.phtml');
        $this->view->title = 'Home';
        $this->send();
    }

    public function overview(): void
    {
        $this->prepareView('overview.phtml');
        $this->view->title = 'Overview';
        $this->send();
    }

    public function documentation(): void
    {
        $this->prepareView('documentation.phtml');
        $this->view->title = 'Documentation';
        $this->send();
    }

    public function development(): void
    {
        $this->prepareView('development.phtml');
        $this->view->title = 'Development';
        $this->send();
    }

    public function license(): void
    {
        $this->prepareView('license.phtml');
        $this->send(null, 200, 'OK', ['Content-Type' => 'text/plain']);
    }

    public function version(): void
    {
        $this->send($this->application->config['version'], 200, 'OK', ['Content-Type' => 'text/plain']);
    }

}
