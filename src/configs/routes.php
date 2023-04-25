<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\ExampleController;
use App\Controllers\HomeController;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/example', [ExampleController::class, 'index']);
};