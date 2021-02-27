<?php

namespace Blog\Module\DI\GI\Component\Authentication\Login\Dialog;

use GI\Component\Authentication\Login\Dialog\Context\AbstractContext as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Context extends Base implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     * @throws \Exception
     */
    public function getCheckAction()
    {
        return $this->blogGetRouteTree()->getAuthenticationTree()->getLogin()->build();
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