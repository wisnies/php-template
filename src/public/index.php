<?php

declare(strict_types=1);

use App\Examples\ExampleClass;


require __DIR__ . '/../vendor/autoload.php';

$example = new ExampleClass(1, 2, 3, 4, 5);

echo '<pre>';
var_dump($example->returnNumber(x: 1));
echo '</pre>';

echo '<pre>';
var_dump($example());
echo '</pre>';