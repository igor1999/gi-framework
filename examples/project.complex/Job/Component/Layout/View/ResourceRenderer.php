<?php

namespace Job\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Job/Component/Layout';


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