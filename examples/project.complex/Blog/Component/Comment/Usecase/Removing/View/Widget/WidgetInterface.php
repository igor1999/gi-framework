<?php

namespace Blog\Component\Comment\Usecase\Removing\View\Widget;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id);
}