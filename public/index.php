<?php

declare(strict_types=1);

use App\DebtCollectionService;
use App\Rocky;

require __DIR__ . '/../vendor/autoload.php';

$collector = new DebtCollectionService();
echo $collector->collectDebt(new Rocky());
