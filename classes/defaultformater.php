<?php

namespace PerformanceCounter;

class DefaultFormater implements Formater
{

    public function format(int $hrtime): string
    {
        return $hrtime / 1.e6;
    }
}
