<?php

namespace Blog\Component\User\Statistic\Totally\Usecase;

use GI\Component\Base\AbstractComponent;
use Blog\Component\User\Statistic\Totally\Usecase\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\Table\TableInterface;
use Blog\Component\User\Statistic\Totally\Usecase\View\ViewInterface;

class Totally extends AbstractComponent implements TotallyInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var TableInterface
     */
    private $table;


    /**
     * Totally constructor.
     * @param array $contents
     * @throws \Exception
     */
    public function __construct(array $contents)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->table = $this->blogGetComponentFactory()->getStatisticFactory()->createTotallyTable();
        $this->table->getViewModel()->hydrate($contents);
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return TableInterface
     */
    protected function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setTable($this->getTable())->toString();
    }
}