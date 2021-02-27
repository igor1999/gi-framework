<?php

namespace Blog\Component\User\Statistic\Single\Calendar\View;

use GI\Component\Calendar\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Single/Calendar';


    const CSS_PATHS = [
        'css/calendar.css'
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

        $this->createContents(self::class, '', self::URL_BASE_DIR,
            self::CSS_PATHS, self::JS_PATHS
        );
    }
}