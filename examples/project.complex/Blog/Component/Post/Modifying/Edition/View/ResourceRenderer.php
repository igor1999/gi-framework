<?php

namespace Blog\Component\Post\Modifying\Edition\View;

use Blog\Component\Post\Modifying\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Modifying/Edition';


    const CSS_PATHS = [
        'css/edition.css'
    ];

    const JS_PATHS = [
        'js/edition.js',
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