<?php

namespace STA\Component\Switchers\View;

use Core\View\AbstractResourceRenderer as Base;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'STA/Component/Switchers';


    const CSS_PATHS = [
        'css/switchers.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createClassContents(self::class);
    }
}