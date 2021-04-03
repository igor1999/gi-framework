<?php

namespace Blog\Component\Comment\Header\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Header';


    const CSS_PATHS = [
        'css/header.css'
    ];
}