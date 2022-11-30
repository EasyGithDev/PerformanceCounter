<?php

namespace PerformanceCounter;

class Counter
{
    protected int $starAt;
    protected int $endAt;
    protected int $hrtime;

    public function start(): Counter
    {
        $this->starAt = hrtime(true);
        return $this;
    }

    public function stop(): Counter
    {
        $this->endAt = hrtime(true);
        return $this;
    }

    public function elapsedTime(): Counter
    {
        $this->hrtime = ($this->endAt - $this->starAt);
        return $this;
    }

    /**
     * Get the value of hrtime
     */
    public function getHrtime()
    {
        return $this->hrtime;
    }

    public function format(Formater $formater): string
    {
        return $formater->format($this->hrtime);
    }

    public static function run(callable $func, Formater $format = null, ...$args): \stdClass
    {
        $counter = new self;
        $counter->start();

        $result = call_user_func_array($func, $args);

        $counter->stop()->elapsedTime();

        $obj = new \stdClass;
        $obj->result = $result;
        $obj->elapsedTime = is_null($format) ? $counter->getHrtime() : $counter->format($format);

        return $obj;
    }
}