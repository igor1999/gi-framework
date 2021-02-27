<?php

namespace Blog\Component\Post\Feed\Set\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Post\Detail\Short\ShortInterface as DetailInterface;

interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();

    /**
     * @return DetailInterface[]
     */
    public function getEntries();

    /**
     * @param DetailInterface[] $entries
     * @return self
     */
    public function setEntries(array $entries);
}