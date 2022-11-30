<?php

use PerformanceCounter\Counter;
use PerformanceCounter\DefaultFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;

$hrtime = $counter::run('mb_strtoupper',
'hello world',
new DefaultFormater, 
);

var_dump($hrtime);
