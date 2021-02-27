<?php

namespace Job\Component\Factory;

use GI\Component\Factory\Base\AbstractFactory as Base;

use Job\Component\Layout\Layout;
use Job\Component\Home\Home;
use Job\Component\Process\Process;


use Job\ServiceLocator\ServiceLocatorAwareTrait;


use Job\Component\Layout\LayoutInterface;
use Job\Component\Home\HomeInterface;
use Job\Component\Process\ProcessInterface;

/**
 * Class Factory
 * @package Job\Component\Factory
 *
 * @method LayoutInterface createLayout()
 * @method HomeInterface createHome()
 * @method ProcessInterface createProcess()
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->set(Layout::class)
            ->set(Home::class)
            ->set(Process::class);
    }
}