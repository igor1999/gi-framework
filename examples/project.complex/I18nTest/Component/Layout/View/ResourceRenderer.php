<?php

namespace I18nTest\Component\Layout\View;

use Core\Component\Layout\View\AbstractResourceRenderer;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends AbstractResourceRenderer implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'I18nTest/Component/Layout';


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

        $this->createContents(self::class, '', self::URL_BASE_DIR, self::CSS_PATHS);
    }
}