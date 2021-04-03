<?php

namespace Blog\Component\Comment\Footer\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Footer';


    const CSS_PATHS = [
        'css/footer.css'
    ];
}