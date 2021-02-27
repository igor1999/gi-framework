<?php

namespace Blog\Component\Comment\Modifying\Creation\Gate;

use GI\Component\Base\Gate\GateInterface as BaseInterface;

interface GateInterface extends BaseInterface
{
    /**
     * save new comment
     */
    public function save();
}