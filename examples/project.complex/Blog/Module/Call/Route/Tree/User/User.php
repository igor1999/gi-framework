<?php

namespace Blog\Module\Call\Route\Tree\User;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;
use Blog\Module\Call\Route\Tree\User\Statistic\Statistic as StatisticTree;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Blog\Module\Call\Route\Tree\User\Statistic\StatisticInterface as StatisticTreeInterface;

/**
 * Class User
 * @package Blog\Module\Call\Route\Tree\User
 *
 * @method StatisticTreeInterface getStatisticTree()
 */
class User extends Base implements UserInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * User constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setNamed('StatisticTree', StatisticTree::class);
    }

    /**
     * @return ParentTreeInterface
     */
    public function getParent()
    {
        return $this->blogGetRouteTree();
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/user';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getAutocomplete()
    {
        return $this->createUriPathWithMethodGet('/login-autocomplete');
    }
}