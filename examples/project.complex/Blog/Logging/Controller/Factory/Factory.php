<?php

namespace Blog\Logging\Controller\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Logging\Controller\DBActions\Factory\Factory as DBActionsFactory;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\Logging\Controller\DBActions\Factory\FactoryInterface as DBActionsFactoryInterface;

/**
 * Class Factory
 * @package Blog\Logging\Controller\Factory
 *
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var DBActionsFactoryInterface
     */
    private $dbActionsFactory;


    /**
     * @return DBActionsFactoryInterface
     */
    public function getDBActionsFactory()
    {
        if (!($this->dbActionsFactory instanceof DBActionsFactoryInterface)) {
            $this->dbActionsFactory = new DBActionsFactory();
        }

        return $this->dbActionsFactory;
    }
}