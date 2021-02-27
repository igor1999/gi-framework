<?php

namespace Blog\Component\User\Statistic\Totally\Table\View;

use GI\Component\Table\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Totally/Table';


    const CSS_PATHS = [
        'css/totally.css'
    ];

    const IMG_PATHS = [
        'img/arrow-up.png',
        'img/arrow-down.png'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(self::class, '', self::URL_BASE_DIR,
            self::CSS_PATHS, [], self::IMG_PATHS
        );
    }
}