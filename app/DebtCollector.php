<?php

declare(strict_types=1);

namespace App;

interface DebtCollector
{
    public function collect(float $amount): float;
}
