<?php

declare(strict_types=1);

namespace App\Examples;

class ExampleClass
{
    public function __construct(protected int $a = 0, protected int $b = 0, protected int $c = 0, protected int $d = 0, protected int $e = 0)
    {
    }

    public function returnNumber(int $x): int
    {
        return $x;
    }

    private function returnProps(): array
    {
        return [
            $this->a, $this->b, $this->c, $this->d, $this->e
        ];
    }

    public function __invoke()
    {
        return $this->returnProps();
    }
}