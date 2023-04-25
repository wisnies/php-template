<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\ExampleServiceInterface;

class ExampleService implements ExampleServiceInterface
{
    public function test(): string
    {
        return 'Example text.';
    }
}