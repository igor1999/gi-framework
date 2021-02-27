<?php

namespace Blog\Component\User\Statistic\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use Blog\RDB\ORM\User\SetInterface as UserSetInterface;
use GI\Component\Calendar\ViewModel\ViewModelInterface as CalendarViewModelInterface;
use GI\Component\Table\ViewModel\OrderInterface as TableViewModelInterface;

use Blog\Component\User\Statistic\Single\Calendar\CalendarInterface as SingleCalendarInterface;
use Blog\Component\User\Statistic\Single\Usecase\SingleInterface;
use Blog\Component\User\Statistic\Totally\Table\TableInterface as TotallyTableInterface;
use Blog\Component\User\Statistic\Totally\Usecase\TotallyInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Component\User\Statistic\Factory
 *
 * @method SingleCalendarInterface createSingleCalendar(UserRecordInterface $user, CalendarViewModelInterface $viewModel = null)
 * @method SingleInterface createSingle($id, array $contents)
 * @method TotallyTableInterface createTotallyTable(UserSetInterface $dataSource = null, TableViewModelInterface $viewModel = null)
 * @method TotallyInterface createTotally(array $contents)
 */
interface FactoryInterface extends BaseInterface
{

}