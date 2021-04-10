<?php

namespace I18nTest\Component\Message\View;

use Core\View\AbstractResourceRenderer as Base;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'I18nTest/Component/Message';


    const CSS_PATHS = [
        'css/message.css'
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