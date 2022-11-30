<?php

use PerformanceCounter\Counter;
use PerformanceCounter\MicroFormater;

require_once __DIR__ . '/../classes/autoload.php';

$counter = new Counter;

$hrtime = $counter::run('mb_strtoupper',
'hello world',
new MicroFormater, 
);

var_dump($hrtime);
