<?php

namespace Job\Module\Call\Route\Tree\Authentication;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;

class Authentication extends Base implements AuthenticationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->jobGetRouteTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/authentication';
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getLogin()
    {
        return $this->createUriPathWithMethodPost('/login');
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getLogout()
    {
        return $this->createUriPathWithMethodPost('/logout');
    }
}