<?php

namespace Blog\Module\Call\Route\Tree\User\Statistic;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\User\UserInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

/**
 * Class Statistic
 * @package Blog\Module\Call\Route\Tree\User\Statistic
 *
 * @method buildSingleWithId($id)
 */
class Statistic extends Base implements StatisticInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->blogGetRouteTree()->getUserTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/statistic';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getTotally()
    {
        return $this->createUriPathWithMethodGet('/totally');
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getSingle()
    {
        $route = $this->createUriPathWithMethodGet('/single/:id');
        $route->setConstraint('id', '/^\d+$/');

        return $route;
    }
}