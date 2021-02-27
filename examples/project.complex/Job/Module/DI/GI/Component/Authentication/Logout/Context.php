<?php

namespace Job\Module\DI\GI\Component\Authentication\Logout;

use GI\Component\Authentication\Logout\Context\AbstractContext as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getAction()
    {
        return $this->jobGetRouteTree()->getAuthenticationTree()->getLogout()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri()
    {
        return $this->jobGetRouteTree()->getHome()->build();
    }
}