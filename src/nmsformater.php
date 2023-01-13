<?php

namespace PerformanceCounter;

class NmsFormater implements Formater
{
    public function format(int $elapsedTime): string
    {
        $micro = round($elapsedTime / 1.e6);
        $seconds = round($elapsedTime / 1.e9);
        $h = sprintf('%02d', ($seconds / 3600));
        $i = sprintf('%02d', ($seconds / 60 % 60));
      
        return "nano:$elapsedTime micro:$micro seconds:$seconds";
    }
}
