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
}