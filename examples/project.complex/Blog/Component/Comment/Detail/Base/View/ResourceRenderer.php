<?php

namespace Blog\Component\Comment\Detail\Base\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Detail/Base';


    const CSS_PATHS = [
        'css/detail.css'
    ];
}