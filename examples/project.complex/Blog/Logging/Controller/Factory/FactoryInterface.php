<?php

namespace Blog\Logging\Controller\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\Logging\Controller\DBActions\Factory\FactoryInterface as DBActionsFactoryInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Logging\Controller\Factory
 *
 */
interface FactoryInterface extends BaseInterface
{
    /**
     * @return DBActionsFactoryInterface
     */
    public function getDBActionsFactory();
}