<?php

declare(strict_types=1);

namespace App;

class Rocky implements DebtCollector
{
    public function collect(float $amount): float
    {
        return $amount * 0.65;
    }
}
