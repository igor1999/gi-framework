<?php

namespace Blog\Component\User\Statistic\Totally\Table\View;

use GI\Component\Table\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Totally/Table';


    const CSS_PATHS = [
        'css/totally.css'
    ];

    const IMAGE_PATHS = [
        'img/arrow-up.png',
        'img/arrow-down.png'
    ];
}