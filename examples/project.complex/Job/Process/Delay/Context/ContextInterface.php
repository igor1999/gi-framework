<?php

namespace Job\Process\Delay\Context;

interface ContextInterface
{
    /**
     * @return int
     */
    public function getInterval();

    /**
     * @return int
     */
    public function getTimeTotal();
}