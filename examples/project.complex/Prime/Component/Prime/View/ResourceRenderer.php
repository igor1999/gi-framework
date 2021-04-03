<?php

namespace Prime\Component\Prime\View;

use Core\View\AbstractResourceRenderer as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Prime/Component/Prime';


    const CSS_PATHS = [
        'css/prime.css'
    ];
}