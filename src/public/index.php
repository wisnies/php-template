<?php

declare(strict_types=1);

use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Slim\Views\Twig;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../configs/path_constants.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = require CONFIG_PATH . '/container.php';
$router = require CONFIG_PATH . '/routes.php';

AppFactory::setContainer($container);
$app = AppFactory::create();
$router($app);

$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

$app->run();