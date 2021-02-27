<?php

namespace Blog\Component\Comment\Feed\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Blog\Component\Comment\Detail\Full\FullInterface as DetailInterface;

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