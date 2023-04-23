<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Examples\ExampleClass;
use PHPUnit\Framework\TestCase;

class ExampleClassTest extends TestCase
{
    public function test_if_returns_correct_params_when_invoked(): void
    {
        $args = [1, 2, 3, 4, 5];
        $instance = new ExampleClass(...$args);

        $expected = [1, 2, 3, 4, 5];

        $this->assertEquals($expected, $instance());
    }
    public function test_if_it_returns_correct_number(): void
    {
        $instance = new ExampleClass();

        $expected = 77;

        $this->assertEquals($expected, $instance->returnNumber(77));
    }
}