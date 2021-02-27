<?php

namespace Blog\Component\User\Statistic\Totally\Table;

use GI\Component\Table\TableInterface as BaseInterface;
use Blog\Component\User\Statistic\Totally\Table\View\WidgetInterface;

interface TableInterface extends BaseInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();
}