<?php

namespace I18nTest\Component\Message\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;

interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();

    /**
     * @return string
     */
    public function getSounding();

    /**
     * @param string $vocabulary
     * @return self
     */
    public function setSounding($vocabulary);

    /**
     * @return string
     */
    public function getMessage();
}