<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = new PhpFile('migrations.php');
// Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$params = [
    'driver' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname' => $_ENV['DB_DATABASE'] ?? 'pdo_mysql',
];

$ormConfig = ORMSetup::createAttributeMetadataConfiguration(
paths: [
        __DIR__ . "/app/Entity"
    ],
isDevMode: true
);
$connection = DriverManager::getConnection(
    $params,
    $ormConfig
);
$entityManager = new EntityManager($connection, $ormConfig);
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));