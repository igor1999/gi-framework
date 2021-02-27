<?php

namespace Blog\Component\User\Statistic\Single\Calendar;

use GI\Component\Calendar\CalendarInterface as BaseInterface;
use Blog\Component\User\Statistic\Single\Calendar\View\WidgetInterface;

interface CalendarInterface extends BaseInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}