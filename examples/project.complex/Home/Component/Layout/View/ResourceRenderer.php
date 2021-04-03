<?php

namespace Home\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Home/Component/Layout';


    const CSS_PATHS = [
        'css/layout.css'
    ];
}