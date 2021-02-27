<?php

namespace Home\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

interface TreeInterface extends BaseInterface
{
    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getRoot();
}