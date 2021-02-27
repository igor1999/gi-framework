<?php

namespace Job\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Job\Module\Call\Route\Tree\Authentication\Authentication as AuthenticationTree;
use Job\Module\Call\Route\Tree\Process\Process;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Job\Module\Call\Route\Tree\Authentication\AuthenticationInterface as AuthenticationTreeInterface;
use Job\Module\Call\Route\Tree\Process\ProcessInterface;

/**
 * Class Root
 * @package Job\Module\Call\Route\Tree
 *
 * @method AuthenticationTreeInterface getAuthenticationTree()
 * @method ProcessInterface getProcessTree()
 */
class Root extends Base implements RootInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Root constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('AuthenticationTree',  AuthenticationTree::class)
            ->setNamed('ProcessTree', Process::class);
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/job';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getHome()
    {
        return $this->createUriPathWithMethodGet('');
    }
}