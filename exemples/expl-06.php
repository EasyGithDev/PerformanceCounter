<?php

use PerformanceCounter\Counter;
use PerformanceCounter\NmsFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;


$hrtime = $counter::run(function () {
    $a = 0;
    for ($i = 0; $i < 60; $i++) {
        sleep(1);
        $a++;
    }
}, 
new NmsFormater);

var_dump($hrtime);
