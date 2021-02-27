<?php

namespace Blog\Module\DI\GI\Component\Authentication\Logout;

use GI\Component\Authentication\Logout\Context\ContextInterface as BaseInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getAction();

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri();
}