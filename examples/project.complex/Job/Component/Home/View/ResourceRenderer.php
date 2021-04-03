<?php

namespace Job\Component\Home\View;

use Job\Component\Base\View\AbstractResourceRenderer as Base;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Job/Component/Home';


    const CSS_PATHS = [
        'css/home.css'
    ];
}