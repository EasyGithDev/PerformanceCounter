<?php

namespace PerformanceCounter;

class DefaultFormater implements Formater
{
    public function format(int $elapsedTime): string
    {
        return $elapsedTime / 1.e6;
    }
}
