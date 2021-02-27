<?php

namespace I18nTest\Component\Layout\View;

use Core\Component\Layout\View\ViewInterface as BaseInterface;

use GI\Component\Locales\LocalesInterface;

/**
 * Interface ViewInterface
 * @package I18nTest\Component\Layout\View
 *
 * @method LocalesInterface getLocales()
 * @method ViewInterface setLocales(LocalesInterface $locales)
 */
interface ViewInterface extends BaseInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}