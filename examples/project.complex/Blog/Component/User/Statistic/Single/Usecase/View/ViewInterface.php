<?php

namespace Blog\Component\User\Statistic\Single\Usecase\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\User\I18n\I18nAwareInterface;
use Blog\Component\User\Statistic\Single\Calendar\CalendarInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\User\Statistic\Single\Usecase\View
 *
 * @method CalendarInterface getCalendar()
 * @method ViewInterface setCalendar(CalendarInterface $calendar)
 * @method UserRecordInterface getUser()
 * @method ViewInterface setUser(UserRecordInterface $user)
 */
interface ViewInterface extends BaseInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}