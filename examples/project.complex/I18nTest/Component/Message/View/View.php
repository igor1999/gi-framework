<?php

namespace I18nTest\Component\Message\View;

use GI\Component\Base\View\AbstractView as Base;
use I18nTest\Component\Message\I18n\Glossary;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use I18nTest\Component\Message\I18n\GlossaryInterface;

class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'i18n-test-message';


    const MESSAGE_TEMPLATE_PART_1 = 'Your selected locale: %s.';

    const MESSAGE_TEMPLATE_PART_2 = 'For change please use list above.';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var string
     */
    private $sounding;

    /**
     * @var string
     */
    private $message;



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

    /**
     * @return string
     */
    public function getSounding()
    {
        return $this->sounding;
    }

    /**
     * @param string $sounding
     * @return self
     */
    public function setSounding($sounding)
    {
        $this->sounding = $sounding;

        $template1 = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,static::MESSAGE_TEMPLATE_PART_1
        );
        $part1 = sprintf($template1, $this->sounding);

        $template2 = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,static::MESSAGE_TEMPLATE_PART_2
        );
        $this->message = $part1 . ' ' . $template2;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}