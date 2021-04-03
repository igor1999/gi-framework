<?php

namespace Blog\Component\Comment\Body\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Body';


    const CSS_PATHS = [
        'css/body.css'
    ];
}