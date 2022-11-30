<?php

namespace PerformanceCounter;

class Counter
{
    protected int $starAt;
    protected int $endAt;
    protected int $elapsedTime;

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
        $this->elapsedTime = ($this->endAt - $this->starAt);
        return $this;
    }

    /**
     * Get the value of elapsedTime
     */
    public function getElapsedTime()
    {
        return $this->elapsedTime;
    }

    public function format(Formater $formater): string
    {
        return $formater->format($this->elapsedTime);
    }

    public static function run(callable $func, ...$args): \stdClass
    {
        $format = null;

        if (count($args) > 0) {
            $lastArg = $args[count($args) - 1];
            if (
                is_object($lastArg) &&
                array_values(class_implements(get_class($lastArg)))[0]  == Formater::class
            ) {
                $format = $lastArg;
                unset($args[count($args) - 1]);
            }
        }

        $counter = new self;
        $counter->start();

        $result = call_user_func_array($func, $args);

        $counter->stop()->elapsedTime();

        $obj = new \stdClass;
        $obj->result = $result;
        $obj->elapsedTime = is_null($format) ? $counter->getElapsedTime() : $counter->format($format);

        return $obj;
    }
}
