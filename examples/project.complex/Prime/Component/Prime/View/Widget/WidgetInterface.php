<?php

namespace Prime\Component\Prime\View\Widget;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param array $numbers
     * @return self
     */
    public function setNumbers(array $numbers);
}