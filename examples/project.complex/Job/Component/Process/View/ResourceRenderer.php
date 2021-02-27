<?php

namespace Job\Component\Process\View;

use Job\Component\Base\View\AbstractResourceRenderer as Base;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    const URL_BASE_DIR = 'Job/Process';


    const CSS_PATHS = [
        'css/process.css'
    ];

    const JS_PATHS = [
        'js/process.js',
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