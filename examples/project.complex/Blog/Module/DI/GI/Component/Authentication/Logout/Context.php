<?php

namespace Blog\Module\DI\GI\Component\Authentication\Logout;

use GI\Component\Authentication\Logout\Context\AbstractContext as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getAction()
    {
        return $this->blogGetRouteTree()->getAuthenticationTree()->getLogout()->build();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri()
    {
        return $this->blogGetRouteTree()->getPostTree()->getFeed()->build();
    }
}