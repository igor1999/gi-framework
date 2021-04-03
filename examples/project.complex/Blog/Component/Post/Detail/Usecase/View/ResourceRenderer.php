<?php

namespace Blog\Component\Post\Detail\Usecase\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Detail/Usecase';


    const CSS_PATHS = [
        'css/detail.css'
    ];
}