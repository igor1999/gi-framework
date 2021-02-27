<?php

namespace Blog\Component\Comment\Modifying\Creation\View;

use Blog\Component\Comment\Modifying\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Modifying/Creation';


    const CSS_PATHS = [
        'css/creation.css'
    ];

    const JS_PATHS = [
        'js/factory.js'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(
            self::class, '', self::URL_BASE_DIR, self::CSS_PATHS, self::JS_PATHS
        );
    }
}