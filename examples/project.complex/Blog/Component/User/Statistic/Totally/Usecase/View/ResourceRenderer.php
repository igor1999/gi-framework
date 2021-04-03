<?php

namespace Blog\Component\User\Statistic\Totally\Usecase\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Totally/Usecase';


    const CSS_PATHS = [
        'css/totally.css'
    ];
}