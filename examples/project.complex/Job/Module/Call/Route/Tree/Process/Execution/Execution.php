<?php

namespace Job\Module\Call\Route\Tree\Process\Execution;

use GI\REST\Route\Segmented\Tree\CLI\AbstractTree as Base;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use Job\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\CLI\CLIInterface;
class Execution extends Base implements ExecutionInterface
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
        return '/execution';
    }

    /**
     * @return CLIInterface
     * @throws \Exception
     */
    public function getStart()
    {
        return $this->createCLI('/start');
    }
}