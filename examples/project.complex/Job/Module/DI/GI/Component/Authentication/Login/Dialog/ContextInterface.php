<?php

namespace Job\Module\DI\GI\Component\Authentication\Login\Dialog;

use GI\Component\Authentication\Login\Dialog\Context\ContextInterface as BaseInterface;

interface ContextInterface extends BaseInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getCheckAction();

    /**
     * @return string
     * @throws \Exception
     */
    public function getRedirectUri();
}