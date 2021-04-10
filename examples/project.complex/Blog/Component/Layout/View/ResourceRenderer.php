<?php

namespace Blog\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Blog/Component/Layout';


    const CSS_PATHS = [
        'css/layout.css'
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