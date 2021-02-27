<?php

namespace Chat\Component\Home\View;

use Chat\Component\Base\View\AbstractResourceRenderer as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Chat/Component/Home';


    const CSS_PATHS = [
        'css/home.css'
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