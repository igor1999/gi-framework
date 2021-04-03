<?php

namespace Prime\Component\Prime\View\Widget;

use Core\View\AbstractResourceRenderer as Base;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Prime/Component/Prime/Widget';


    const CSS_PATHS = [
        'css/prime.css'
    ];
}