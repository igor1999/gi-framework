<?php

namespace Blog\Component\User\Statistic\Totally\Table;

use GI\Component\Table\AbstractTable;
use Blog\Component\User\Statistic\Totally\Table\View\Widget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\User\Statistic\Totally\Table\View\WidgetInterface;
use GI\Component\Table\ViewModel\OrderInterface as ViewModelInterface;
use Blog\RDB\ORM\User\SetInterface as UserSetInterface;

class Table extends AbstractTable implements TableInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;


    /**
     * Table constructor.
     * @param UserSetInterface|null $dataSource
     * @param ViewModelInterface|null $viewModel
     * @throws \Exception
     */
    public function __construct(UserSetInterface $dataSource = null, ViewModelInterface $viewModel = null)
    {
        parent::__construct($dataSource, $viewModel);

        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->getViewModel()->setDefaultCriteria('login');
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        if (!($this->getDataSource() instanceof UserSetInterface)) {
            $dataSource = $this->blogGetRDBORMFactory()->createUserSet()->loadStat(
                $this->getViewModel()->getCriteria(), $this->getViewModel()->getDirectionAsBool()
            );
            $this->setDataSource($dataSource);
        }

        return parent::toString();
    }
}