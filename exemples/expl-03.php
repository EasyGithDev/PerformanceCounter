<?php

use PerformanceCounter\Counter;
use PerformanceCounter\MicroFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;

$hrtime = $counter::run(function () {
    $a = 0;
    for ($i = 0; $i < 100; $i++) {
        $a++;
    }
}, 
new MicroFormater);

var_dump($hrtime);
