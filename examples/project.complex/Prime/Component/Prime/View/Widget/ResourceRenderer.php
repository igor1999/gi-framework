<?php

namespace Prime\Component\Prime\View\Widget;

use GI\Component\Table\View\Widget\AbstractResourceRenderer as Base;
use Core\View\AbstractResourceRenderer as CoreResourceRenderer;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Prime/Component/Prime/Widget';


    const CSS_PATHS = [
        'css/prime.css'
    ];


    /**
     * ResourceRenderer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->createClassContents(CoreResourceRenderer::class)->createClassContents(self::class);
    }
}