<?php

namespace Blog\Component\User\Statistic\Single\Usecase\View;

use GI\Component\Base\View\AbstractView;

use Blog\Component\User\I18n\I18nAwareTrait;
use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Single\Calendar\CalendarInterface;
use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;

/**
 * Class View
 * @package Blog\Component\User\Statistic\Single\Usecase\View
 *
 * @method CalendarInterface getCalendar()
 * @method ViewInterface setCalendar(CalendarInterface $calendar)
 * @method UserRecordInterface getUser()
 * @method ViewInterface setUser(UserRecordInterface $user)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-single';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * View constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }
}