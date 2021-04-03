<?php

namespace Blog\Component\Post\Header\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Header';


    const CSS_PATHS = [
        'css/header.css'
    ];
}