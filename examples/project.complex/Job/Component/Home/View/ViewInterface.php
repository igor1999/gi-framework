<?php

namespace Job\Component\Home\View;

use GI\Component\Base\View\ViewInterface as BaseInterface;
use Job\ServiceLocator\ServiceLocatorAwareInterface;

/**
 * Interface ViewInterface
 * @package Job\Component\Home\View
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