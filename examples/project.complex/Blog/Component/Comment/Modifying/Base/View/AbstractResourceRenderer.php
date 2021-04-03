<?php

namespace Blog\Component\Comment\Modifying\Base\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

abstract class AbstractResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Modifying/Base';


    const CSS_PATHS = [
        'css/modifying.css'
    ];

    const JS_PATHS = [
        'js/modifying.js'
    ];
}