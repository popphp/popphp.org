<?php

$autoloader = include __DIR__ . '/../vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->safeLoad();

try {
    $app = new Popcorn\Pop($autoloader, include __DIR__ . '/../app/config/app.http.php');
    $app->register(new App\Module());
    $app->run();
} catch (\Exception $exception) {
    $app = new App\Module();
    $app->error($exception);
}
