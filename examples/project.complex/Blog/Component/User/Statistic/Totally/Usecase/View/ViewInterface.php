<?php

namespace Blog\Component\User\Statistic\Totally\Usecase\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\User\I18n\I18nAwareInterface;
use Blog\Component\User\Statistic\Totally\Table\TableInterface;

/**
 * Interface ViewInterface
 * @package Blog\Component\User\Statistic\Totally\Usecase\View
 *
 * @method TableInterface getTable()
 * @method ViewInterface setTable(TableInterface $table)
 */
interface ViewInterface extends BaseInterface, I18nAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}