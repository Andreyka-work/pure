<?php

declare(strict_types=1);

namespace App;

trait CappuccinoTrait
{
    public function makeCappuccino(): void
    {
        echo static::class . ' is making cappuccino' . PHP_EOL;
    }
}
