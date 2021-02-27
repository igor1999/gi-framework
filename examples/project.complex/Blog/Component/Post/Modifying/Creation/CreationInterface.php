<?php

namespace Blog\Component\Post\Modifying\Creation;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Modifying\Creation\View\WidgetInterface;

interface CreationInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function save(array $data);

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}