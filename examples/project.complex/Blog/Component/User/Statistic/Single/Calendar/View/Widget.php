<?php

namespace Blog\Component\User\Statistic\Single\Calendar\View;

use GI\Component\Calendar\View\AbstractWidget;
use Blog\Component\Post\Search\ViewModel\Post as PostSearchViewModel;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\User\I18n\I18nAwareTrait;

use Blog\RDB\ORM\User\RecordInterface as UserRecordInterface;
use GI\DOM\HTML\Element\Table\Cell\TD\TDInterface;
use GI\Calendar\Day\DayInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as PostSearchViewModelInterface;
use GI\REST\URL\Builder\BuilderInterface as URLBuilderInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-user-statistic-post-calendar';


    const CLASS_LINK_CELL = 'gi-link-cell';


    /**
     * @var UserRecordInterface
     */
    private $user;

    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var array
     */
    private $statistic = [];

    /**
     * @var PostSearchViewModelInterface
     */
    private $postSearchViewModel;

    /**
     * @var URLBuilderInterface
     */
    private $urlBuilder;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );

        $this->postSearchViewModel = $this->giGetDi(
            PostSearchViewModelInterface::class, PostSearchViewModel::class
        );

        $this->urlBuilder = $this->giCreateURLBuilder();
    }

    /**
     * @return UserRecordInterface
     */
    protected function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserRecordInterface $user
     * @return self
     */
    public function setUser(UserRecordInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return array
     */
    protected function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @return PostSearchViewModelInterface
     */
    protected function getPostSearchViewModel()
    {
        return $this->postSearchViewModel;
    }

    /**
     * @return URLBuilderInterface
     */
    protected function getUrlBuilder()
    {
        return $this->urlBuilder;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function create()
    {
        $this->statistic = $this->getUser()->getPostsStat(
            $this->getViewModel()->getMonthAsDateTime()->format('Y-m-d')
        );

        parent::create();

        return $this;
    }

    /**
     * @param DayInterface $day
     * @param TDInterface $cell
     * @return self
     * @throws \Exception
     */
    protected function configContentCell(DayInterface $day, TDInterface $cell)
    {
        $date = $day->getDate()->format('Y-m-d');

        if (isset($this->statistic[$date])) {
            $postSearch = $this->getPostSearchViewModel();

            $this->getUrlBuilder()->setPath($this->blogGetRouteTree()->getPostTree()->getFeed()->build());

            $this->getUrlBuilder()->getQuery()
                ->clean()
                ->set($postSearch->renderFromName(), $date)
                ->set($postSearch->renderTillName(), $date)
                ->set($postSearch->getUser()->getLoginName(), $this->getUser()->getLogin());

            $href = $this->getUrlBuilder()->toString();

            $a = $this->giGetDOMFactory()->createHyperlink($href, $day->getNumberInMonth());

            $cell->getAttributes()->setTitle(
                $this->statistic[$date] . ' ' . $this->translate('post(s)')
            );
            $cell->getClasses()->add(static::CLASS_LINK_CELL);
            $cell->getChildNodes()->set($a);
        }

        return $this;
    }
}