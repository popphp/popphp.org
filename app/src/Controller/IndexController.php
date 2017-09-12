<?php

namespace App\Controller;

class IndexController extends AbstractController
{

    public function index()
    {
        $this->prepareView('index.phtml');
        $this->view->title = 'Home';
        $this->send();
    }

    public function overview()
    {
        $this->prepareView('overview.phtml');
        $this->view->title = 'Overview';
        $this->send();
    }

    public function documentation()
    {
        $this->prepareView('documentation.phtml');
        $this->view->title = 'Documentation';
        $this->send();
    }

    public function development()
    {
        $this->prepareView('development.phtml');
        $this->view->title = 'Development';
        $this->send();
    }

    public function license()
    {
        $this->prepareView('license.phtml');
        $this->send(null, 200, 'OK', ['Content-Type' => 'text/plain']);
    }

    public function version()
    {
        $this->send(file_get_contents(__DIR__ . '/../../view/version.txt'), 200, 'OK', ['Content-Type' => 'text/plain']);
    }

}