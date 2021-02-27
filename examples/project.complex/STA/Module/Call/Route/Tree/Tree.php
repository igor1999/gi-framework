<?php

namespace STA\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

class Tree extends Base implements TreeInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/sta';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getSwitchers()
    {
        return $this->createUriPathWithMethodGet('/switchers');
    }
}