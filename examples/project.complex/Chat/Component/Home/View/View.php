<?php

namespace Chat\Component\Home\View;

use GI\Component\Base\View\AbstractView as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

/**
 * Class View
 * @package Chat\Component\Home\View
 *
 * @method bool isAuth()
 * @method ViewInterface setAuth(bool $auth)
 */
class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'chat-home';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * View constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }
}