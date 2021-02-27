<?php

namespace Job\Component\Base\View;

use Core\View\AbstractResourceRenderer as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

abstract class AbstractResourceRenderer extends Base
{
    use ServiceLocatorAwareTrait, JobJSTrait;


    /**
     * AbstractResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->addJobJS();
    }
}