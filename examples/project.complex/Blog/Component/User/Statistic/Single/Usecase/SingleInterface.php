<?php

namespace Blog\Component\User\Statistic\Single\Usecase;

use GI\Component\Base\ComponentInterface;
use Blog\Component\User\Statistic\Single\Usecase\View\ViewInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

interface SingleInterface extends ComponentInterface
{
    /**
     * @return ViewInterface
     */
    public function getView();

    /**
     * @return UserRecordInterface
     */
    public function getUser();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}