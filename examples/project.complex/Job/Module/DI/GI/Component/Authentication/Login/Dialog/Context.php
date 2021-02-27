<?php

namespace Job\Module\DI\GI\Component\Authentication\Login\Dialog;

use GI\Component\Authentication\Login\Dialog\Context\AbstractContext as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getCheckAction()
    {
        return $this->jobGetRouteTree()->getAuthenticationTree()->getLogin()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri()
    {
        return $this->jobGetRouteTree()->getProcessTree()->getProcess()->build();
    }
}