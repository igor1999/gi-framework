<?php

namespace Core\View;

use GI\Component\Base\View\ResourceRenderer\Core\Core;

abstract class AbstractResourceRenderer extends Core implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Core/View';


    const CSS_PATHS = [
        'css/default.css'
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