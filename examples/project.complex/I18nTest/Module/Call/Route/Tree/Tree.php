<?php

namespace I18nTest\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree as Base;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

class Tree extends Base implements TreeInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/i18n-test';
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getRoot()
    {
        return $this->createUriPathWithMethodGet('');
    }
}