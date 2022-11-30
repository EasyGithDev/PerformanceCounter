<?php

namespace PerformanceCounter;

interface Formater
{
    public function format(int $elapsedTime): string;
}
