<?php

declare(strict_types=1);

namespace App;

class CollectionAgency implements DebtCollector
{
    public function collect(float $amount): float
    {
        $garanteedAmount = $amount * 0.5;

        return rand((int)$garanteedAmount, (int)$amount);
    }
}
