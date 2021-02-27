<?php

namespace Core\Module\Call\Web;

use GI\Application\Call\Web\Call as WebCall;

use GI\REST\Request\Factory\FactoryInterface as RequestFactoryInterface;

abstract class AbstractCall extends WebCall implements CallInterface
{
    /**
     * @return RequestFactoryInterface
     */
    public function getRequest()
    {
        return parent::getRequest();
    }
}