<?php

namespace Blog\Component\Comment\Usecase\Removing\Gate;

use Blog\Component\Base\Gate\UsecaseInterface as BaseInterface;

interface GateInterface extends BaseInterface
{
    /**
     * @throws \Throwable
     */
    public function delete();
}