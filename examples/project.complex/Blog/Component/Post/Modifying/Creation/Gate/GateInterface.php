<?php

namespace Blog\Component\Post\Modifying\Creation\Gate;

use Blog\Component\Base\Gate\UsecaseInterface as BaseInterface;

interface GateInterface extends BaseInterface
{
    /**
     * save new comment
     * @throws \Throwable
     */
    public function save();
}