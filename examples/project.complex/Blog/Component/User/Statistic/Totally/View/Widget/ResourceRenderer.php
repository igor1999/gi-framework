<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget;

use GI\Component\Table\View\Widget\AbstractResourceRenderer as Base;
use Core\View\AbstractResourceRenderer as CoreResourceRenderer;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Totally/Widget';


    const CSS_PATHS = [
        'css/totally.css'
    ];

    const IMAGE_PATHS = [
        'img/arrow-up.png',
        'img/arrow-down.png'
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