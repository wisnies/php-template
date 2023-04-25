<?php

declare(strict_types=1);

use function DI\create;
use App\Libs\Config;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use App\Interfaces\ExampleServiceInterface;
use App\Services\ExampleService;
use Slim\Views\Twig;


return [
    Config::class => create(Config::class)->constructor($_ENV),
    EntityManager::class => function (Config $config) {

        $ormConfig = ORMSetup::createAttributeMetadataConfiguration(
        paths: [
                __DIR__ . "/../app/Entity"
            ],
        isDevMode: true
        );
        $connection = DriverManager::getConnection(
            $config->db,
            $ormConfig
        );
        return new EntityManager($connection, $ormConfig);
    },
    ExampleServiceInterface::class => new ExampleService(),
    Twig::class => function (Config $config) {
        $twig = Twig::create(
            VIEW_PATH,
            ['cache' => STORAGE_PATH . '/cache', 'auto_reload' => $config->environment === 'development']
        );

        // add extensions here
        return $twig;
    }
];