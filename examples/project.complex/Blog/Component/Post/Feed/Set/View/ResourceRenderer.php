<?php

namespace Blog\Component\Post\Feed\Set\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Feed/Set';


    const CSS_PATHS = [
        'css/set.css'
    ];
}