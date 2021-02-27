<?php

namespace Chat\Module\DI\GI\Component\Authentication\Logout;

use GI\Component\Authentication\Logout\Context\AbstractContext as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getAction()
    {
        return $this->chatGetRouteTree()->getAuthenticationTree()->getLogout()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri()
    {
        return $this->chatGetRouteTree()->getHome()->build();
    }
}