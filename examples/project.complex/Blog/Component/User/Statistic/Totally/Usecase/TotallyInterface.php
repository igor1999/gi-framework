<?php

namespace Blog\Component\User\Statistic\Totally\Usecase;

use GI\Component\Base\ComponentInterface;
use Blog\Component\User\Statistic\Totally\Usecase\View\ViewInterface;

interface TotallyInterface extends ComponentInterface
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