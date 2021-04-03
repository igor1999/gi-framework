<?php

namespace Blog\Component\Post\Body\Full\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Body/Full';


    const CSS_PATHS = [
        'css/body.css'
    ];
}