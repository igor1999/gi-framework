<?php

namespace Blog\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Base\View\BlogJSTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait, BlogJSTrait;


    const URL_BASE_DIR = 'Blog/Component/Layout';


    const CSS_PATHS = [
        'css/layout.css'
    ];
}