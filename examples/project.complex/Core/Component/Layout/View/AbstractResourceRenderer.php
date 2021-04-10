<?php

namespace Core\Component\Layout\View;

use Core\View\AbstractResourceRenderer as Base;

abstract class AbstractResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Core/Component/Layout';


    const CSS_PATHS = [
        'css/layout.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createClassContents(self::class);
    }
}