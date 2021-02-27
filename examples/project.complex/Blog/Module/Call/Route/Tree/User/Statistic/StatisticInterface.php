<?php

namespace Blog\Module\Call\Route\Tree\User\Statistic;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\User\UserInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

/**
 * Interface StatisticInterface
 * @package Blog\Module\Call\Route\Tree\User\Statistic
 *
 * @method buildSingleWithId($id)
 */
interface StatisticInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getTotally();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getSingle();
}