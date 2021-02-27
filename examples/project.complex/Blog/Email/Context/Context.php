<?php

namespace Blog\Email\Context;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Context implements ContextInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    public function getAdminEmail()
    {
        return 'info@igor-gilman.de';
    }
}