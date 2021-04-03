<?php

namespace Chat\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Chat/Component/Layout';


    const CSS_PATHS = [
        'css/layout.css'
    ];
}