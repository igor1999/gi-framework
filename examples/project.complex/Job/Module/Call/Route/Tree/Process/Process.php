<?php

namespace Job\Module\Call\Route\Tree\Process;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;
use Job\Module\Call\Route\Tree\Process\Execution\Execution;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use Job\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use Job\Module\Call\Route\Tree\Process\Execution\ExecutionInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

/**
 * Class Process
 * @package Job\Module\Call\Route\Tree\Process
 *
 * @method ExecutionInterface getExecutionTree()
 */
class Process extends Base implements ProcessInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Process constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('ExecutionTree', Execution::class);
    }

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
        return '/process';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getProcess()
    {
        return $this->createUriPathWithMethodGet('');
    }

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getStart()
    {
        return $this->createUriPathWithMethodPost('/start');
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getCheck()
    {
        return $this->createUriPathWithMethodGet('/check');
    }
}