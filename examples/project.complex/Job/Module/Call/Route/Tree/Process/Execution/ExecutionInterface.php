<?php

namespace Job\Module\Call\Route\Tree\Process\Execution;

use GI\REST\Route\Segmented\Tree\CLI\TreeInterface as BaseInterface;

use Job\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\CLI\CLIInterface;

interface ExecutionInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getStart();
}