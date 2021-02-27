<?php

namespace Job\Module\Call\Route\Tree\Process;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Job\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use Job\Module\Call\Route\Tree\Process\Execution\ExecutionInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Post\PostInterface as UriPathWithMethodPostInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

/**
 * Interface RootInterface
 * @package Job\Module\Call\Route\Tree\Process
 *
 * @method ExecutionInterface getExecutionTree()
 */
interface ProcessInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getProcess();

    /**
     * @return UriPathWithMethodPostInterface
     * @throws \Exception
     */
    public function getStart();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getCheck();
}