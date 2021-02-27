<?php

namespace Chat\Component\Home\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Chat\ServiceLocator\ServiceLocatorAwareInterface;

/**
 * Interface ViewInterface
 * @package Chat\Component\Home\View
 *
 * @method bool isAuth()
 * @method ViewInterface setAuth(bool $auth)
 */
interface ViewInterface extends BaseInterface, ServiceLocatorAwareInterface
{
    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer();
}