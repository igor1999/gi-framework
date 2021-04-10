<?php

namespace Blog\Component\Post\Body\Short\View;

use Blog\Component\Post\Body\Full\View\ResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Post/Body/Short';


    const CSS_PATHS = [
        'css/body.css'
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