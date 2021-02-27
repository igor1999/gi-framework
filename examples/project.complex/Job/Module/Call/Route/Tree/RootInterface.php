<?php

namespace Job\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Job\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;
use Job\Module\Call\Route\Tree\Process\ProcessInterface;

/**
 * Interface RootInterface
 * @package Job\Module\Call\Route\Tree
 *
 * @method AuthenticationTreeInterface getAuthenticationTree()
 * @method ProcessInterface getProcessTree()
 */
interface RootInterface extends BaseInterface
{
    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getHome();
}