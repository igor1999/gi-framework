<?php

namespace I18nTest\Component\Layout\View;

use Core\Component\Layout\View\AbstractView;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Component\Locales\LocalesInterface;

/**
 * Class View
 * @package I18nTest\Component\Layout\View
 *
 * @method LocalesInterface getLocales()
 * @method ViewInterface setLocales(LocalesInterface $locales)
 */
class View extends AbstractView implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'i18n-test-layout';


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