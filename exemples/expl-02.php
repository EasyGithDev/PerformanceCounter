<?php

use PerformanceCounter\Counter;
use PerformanceCounter\MicroFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;
$counter->start();

$a = 0;
for ($i = 0; $i < 100; $i++) {
    $a++;
}

$elapsedTime = $counter->stop()
    ->elapsedTime()
    ->format(new MicroFormater);

var_dump($elapsedTime);
