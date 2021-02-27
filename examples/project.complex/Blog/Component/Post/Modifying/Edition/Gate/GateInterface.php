<?php

namespace Blog\Component\Post\Modifying\Edition\Gate;

use Blog\Component\Base\Gate\UsecaseInterface as BaseInterface;

interface GateInterface extends BaseInterface
{
    /**
     * save new comment
     * @throws \Throwable
     */
    public function save();

    /**
     * @throws \Throwable
     */
    public function delete();
}