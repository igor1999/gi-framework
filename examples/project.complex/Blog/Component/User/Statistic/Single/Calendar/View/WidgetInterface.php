<?php

namespace Blog\Component\User\Statistic\Single\Calendar\View;

use GI\Component\Calendar\View\WidgetInterface as BaseInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param UserRecordInterface $user
     * @return self
     */
    public function setUser(UserRecordInterface $user);
}