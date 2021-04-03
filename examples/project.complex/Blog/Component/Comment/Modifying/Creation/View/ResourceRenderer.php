<?php

namespace Blog\Component\Comment\Modifying\Creation\View;

use Blog\Component\Comment\Modifying\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Modifying/Creation';


    const CSS_PATHS = [
        'css/creation.css'
    ];

    const JS_PATHS = [
        'js/factory.js'
    ];
}