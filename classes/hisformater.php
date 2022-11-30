<?php

namespace PerformanceCounter;

class HisFormater implements Formater
{
    public function format(int $elapsedTime): string
    {
        $seconds = round($elapsedTime / 1.e9);
        return sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60);
    }
}
