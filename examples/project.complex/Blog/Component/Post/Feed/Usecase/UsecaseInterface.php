<?php

namespace Blog\Component\Post\Feed\Usecase;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Feed\Usecase\View\ViewInterface;
use GI\SessionExchange\BaseInterface\Aware\SessionExchangeAwareInterface;

interface UsecaseInterface extends ComponentInterface, SessionExchangeAwareInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}