<?php

namespace Blog\Component\User\Statistic\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Component\User\Statistic\Single\Calendar\Calendar as SingleCalendar;
use Blog\Component\User\Statistic\Single\Usecase\Single;
use Blog\Component\User\Statistic\Totally\Totally;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use GI\Component\Calendar\ViewModel\ViewModelInterface as CalendarViewModelInterface;

use Blog\Component\User\Statistic\Single\Calendar\CalendarInterface as SingleCalendarInterface;
use Blog\Component\User\Statistic\Single\Usecase\SingleInterface;
use Blog\Component\User\Statistic\Totally\TotallyInterface;

/**
 * Class Factory
 * @package Blog\Component\User\Statistic\Factory
 *
 * @method SingleCalendarInterface createSingleCalendar(UserRecordInterface $user, CalendarViewModelInterface $viewModel = null)
 * @method SingleInterface createSingle($id, array $contents)
 * @method TotallyInterface createTotally(array $contents)
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setNamed('SingleCalendar', SingleCalendar::class)
            ->set(Single::class)
            ->set(Totally::class);
    }
}