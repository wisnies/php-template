<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Interfaces\ExampleServiceInterface;
use App\Services\ExampleService;
use Doctrine\ORM\EntityManager;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ExampleController
{
    public function __construct(private readonly Twig $twig, protected ExampleServiceInterface $exampleService, protected EntityManager $entityManager)
    {
    }
    public function index(Request $request, Response $response): Response
    {
        echo $this->exampleService->test();
        return $this->twig->render($response, 'example/index.twig');
    }
}