<?php

declare(strict_types=1);

use App\AllInOneCoffeeMaker;
use App\CappuccinoMaker;
use App\CoffeeMaker;
use App\LatteMaker;

require __DIR__ . '/../vendor/autoload.php';

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

$allInOnCoffeeMaker = new AllInOneCoffeeMaker();
$allInOnCoffeeMaker->makeCoffee();
$allInOnCoffeeMaker->makeLatte();
$allInOnCoffeeMaker->makeCappuccino();