<?php

namespace Blog\Component\Post\Search\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Search';


    const CSS_PATHS = [
        'css/search.css'
    ];
}