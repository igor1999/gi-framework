<?php

namespace Blog\Component\Comment\Usecase\Removing\View;

use Blog\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/Comment/Usecase/Removing';


    const CSS_PATHS = [
        'css/removing.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(self::class, '', self::URL_BASE_DIR, self::CSS_PATHS);
    }
}