<?php

use PerformanceCounter\Counter;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;
$counter->start();

$a = 0;
for ($i = 0; $i < 100; $i++) {
    $a++;
}

$elapsedTime = $counter->stop()
    ->elapsedTime()
    ->getElapsedTime();

var_dump($elapsedTime);
