<?php

declare(strict_types=1);

namespace App;

trait LatteTrait
{
    public function makeLatte(): void
    {
        echo static::class . ' is making latte' . PHP_EOL;
    }
}
