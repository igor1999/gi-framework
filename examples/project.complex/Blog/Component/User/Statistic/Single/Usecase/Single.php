<?php

namespace Blog\Component\User\Statistic\Single\Usecase;

use GI\Component\Base\AbstractComponent;
use Blog\Component\User\Statistic\Single\Usecase\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Single\Calendar\CalendarInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Blog\Component\User\Statistic\Single\Usecase\View\ViewInterface;

class Single extends AbstractComponent implements SingleInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var UserRecordInterface
     */
    private $user;

    /**
     * @var CalendarInterface
     */
    private $calendar;


    /**
     * Single constructor.
     * @param int $id
     * @param array $contents
     * @throws \Exception
     */
    public function __construct($id, array $contents)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->user = $this->blogGetRDBORMFactory()->createUserRecord($id);

        $this->calendar = $this->blogGetComponentFactory()->getStatisticFactory()->createSingleCalendar($this->user);
        $this->calendar->hydrate($contents);
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return UserRecordInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return CalendarInterface
     */
    protected function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setUser($this->getUser())->setCalendar($this->getCalendar())->toString();
    }
}