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
     * AbstractResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createContents(self::class, '', self::URL_BASE_DIR, self::CSS_PATHS);
    }
}