<?php

declare(strict_types=1);

use App\Tester;

require __DIR__ . '/../vendor/autoload.php';

$tester = new Tester(1, 'Ivan');

echo "Id: {$tester->getId()}<br>";
echo "Name: {$tester->getName()}";
