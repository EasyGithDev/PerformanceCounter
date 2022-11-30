<?php

use PerformanceCounter\Counter;
use PerformanceCounter\HisFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;

$hrtime = $counter::run(function () {
    $a = 0;
    for ($i = 0; $i < 5; $i++) {
        sleep(1);
        $a++;
    }
}, 
new HisFormater);

var_dump($hrtime);
