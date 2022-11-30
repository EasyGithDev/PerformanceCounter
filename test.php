<?php

use PerformanceCounter\Counter;
use PerformanceCounter\DefaultFormater;

require_once __DIR__ . '/classes/autoload.php';

$counter = new Counter;

$hrtime = $counter::run(function () {
    $a = 0;
    for ($i = 0; $i < 100; $i++) {
        $a++;
    }
}, new DefaultFormater);

var_dump($hrtime);
