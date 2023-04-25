<?php

declare(strict_types=1);

namespace App\Libs;

/**
 * @property-read ?array $db
 * @property-read ?bool $environment
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $_ENV['DB_DRIVER'],
                'host' => $_ENV['DB_HOST'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASS'],
                'dbname' => $_ENV['DB_DATABASE'] ?? 'pdo_mysql',
            ],
            'environment' => $_ENV['APP_ENVIRONMENT'] ?? 'production'
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}