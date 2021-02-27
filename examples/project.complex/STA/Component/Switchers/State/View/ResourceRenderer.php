<?php

namespace STA\Component\Switchers\State\View;

use GI\Component\Switcher\Base\View\ResourceRenderer as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'STA/Component/Switchers/State';


    const CSS_PATHS = [
        'css/state.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(self::class, '', self::URL_BASE_DIR, self::CSS_PATHS);
    }
}