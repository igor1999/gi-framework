<?php

namespace Blog\Component\User\Statistic\Single\Calendar;

use GI\Component\Calendar\AbstractCalendar;
use Blog\Component\User\Statistic\Single\Calendar\View\Widget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Single\Calendar\View\WidgetInterface;
use GI\Component\Calendar\ViewModel\ViewModelInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

class Calendar extends AbstractCalendar implements CalendarInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;

    /**
     * @var UserRecordInterface
     */
    private $user;


    /**
     * Calendar constructor.
     * @param UserRecordInterface $user
     * @param ViewModelInterface|null $viewModel
     * @throws \Exception
     */
    public function __construct(UserRecordInterface $user, ViewModelInterface $viewModel = null)
    {
        parent::__construct($viewModel);

        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->user = $user;
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return UserRecordInterface
     */
    protected function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getView()->setUser($this->getUser());

        return parent::toString();
    }
}