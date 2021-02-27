<?php

namespace Chat\Component\Base\View;

use Core\View\AbstractResourceRenderer as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

abstract class AbstractResourceRenderer extends Base
{
    use ServiceLocatorAwareTrait, ChatJSTrait;


    /**
     * AbstractResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->addChatJS();
    }
}