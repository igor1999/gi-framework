<?php

namespace Blog\Module\Call\Route\Tree\User;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use Blog\Module\Call\Route\Tree\RootInterface as ParentTreeInterface;
use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

use Blog\Module\Call\Route\Tree\User\Statistic\StatisticInterface as StatisticTreeInterface;

/**
 * Interface UserInterface
 * @package Blog\Module\Call\Route\Tree\User
 *
 * @method StatisticTreeInterface getStatisticTree()
 */
interface UserInterface extends BaseInterface
{
    /**
     * @return ParentTreeInterface
     */
    public function getParent();

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getAutocomplete();
}