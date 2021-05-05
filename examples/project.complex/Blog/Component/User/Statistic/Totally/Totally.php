<?php

namespace Blog\Component\User\Statistic\Totally;

use GI\Component\Table\AbstractTable;
use Blog\Component\User\Statistic\Totally\View\View;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\View\ViewInterface;
use Blog\RDB\ORM\User\SetInterface as UserSetInterface;

class Totally extends AbstractTable implements TotallyInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Totally constructor.
     * @param array $contents
     * @throws \Exception
     */
    public function __construct(array $contents)
    {
        parent::__construct($contents);

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->getViewModel()->getOrder()->setCriteriaIfEmpty('login');
    }

    /**
     * @return ViewInterface
     */
    protected function getView()
    {
        return $this->view;
    }

    /**
     * @return UserSetInterface
     * @throws \Exception
     */
    protected function getDataSource()
    {
        return $this->blogGetRDBORMFactory()->createUserSet()->loadStat(
            $this->getViewModel()->getOrder()->getCriteria(), $this->getViewModel()->getOrder()->getDirectionAsBool()
        );
    }
}