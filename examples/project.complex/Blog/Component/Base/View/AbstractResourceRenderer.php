<?php

namespace Blog\Component\Base\View;

use Core\View\AbstractResourceRenderer as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

abstract class AbstractResourceRenderer extends Base
{
    use ServiceLocatorAwareTrait, BlogJSTrait;


    /**
     * AbstractResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->addBlogJS();
    }
}