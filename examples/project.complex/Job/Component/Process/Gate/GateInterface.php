<?php

namespace Job\Component\Process\Gate;

use Job\Component\Base\Gate\UsecaseInterface as BaseInterface;

interface GateInterface extends BaseInterface
{
    /**
     * @return static
     * @throws \Throwable
     */
    public function start();

    /**
     * @return static
     * @throws \Throwable
     */
    public function check();
}