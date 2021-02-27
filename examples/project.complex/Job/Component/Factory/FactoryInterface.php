<?php

namespace Job\Component\Factory;

use GI\Component\Factory\Base\FactoryInterface as BaseInterface;

use Job\Component\Layout\LayoutInterface;
use Job\Component\Home\HomeInterface;
use Job\Component\Process\ProcessInterface;

/**
 * Interface FactoryInterface
 * @package Job\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method HomeInterface createHome()
 * @method ProcessInterface createProcess()
 */
interface FactoryInterface extends BaseInterface
{

}