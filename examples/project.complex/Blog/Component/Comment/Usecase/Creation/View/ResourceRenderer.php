<?php

namespace Blog\Component\Comment\Usecase\Creation\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Usecase/Creation';


    const CSS_PATHS = [
        'css/creation.css'
    ];

    const JS_PATHS = [
        'js/modifying.js'
    ];
}