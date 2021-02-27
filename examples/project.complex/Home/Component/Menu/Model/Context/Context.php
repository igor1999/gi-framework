<?php

namespace Home\Component\Menu\Model\Context;

use Home\ServiceLocator\ServiceLocatorIntegralTrait;

class Context implements ContextInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @return string
     */
    public function getLinkToMicro()
    {
        return 'http://micro.php.gi';
    }
}