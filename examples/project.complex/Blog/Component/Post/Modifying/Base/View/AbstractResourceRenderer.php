<?php

namespace Blog\Component\Post\Modifying\Base\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

abstract class AbstractResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Modifying/Base';


    const CSS_PATHS = [
        'css/modifying.css'
    ];

    const JS_PATHS = [
        'js/modifying.js'
    ];


    /**
     * AbstractResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createClassContents(self::class);
    }
}