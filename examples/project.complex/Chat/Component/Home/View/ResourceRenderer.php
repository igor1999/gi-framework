<?php

namespace Chat\Component\Home\View;

use Core\View\AbstractResourceRenderer as Base;

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

        $this->createClassContents(self::class);
    }
}