<?php

namespace Blog\Component\User\Statistic\Totally\View;

use Core\View\AbstractResourceRenderer as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class ResourceRenderer extends Base implements ResourceRendererInterface
{
    use ServiceLocatorAwareTrait;


    const URL_BASE_DIR = 'Blog/Component/User/Statistic/Totally';


    const CSS_PATHS = [
        'css/totally.css'
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