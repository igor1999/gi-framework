<?php

namespace Blog\Component\Post\Body\Short\View;

use Blog\Component\Post\Body\Full\View\View as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\I18n\I18nAwareTrait;

use Blog\Component\Post\Body\Short\View\Context\ContextInterface;

class View extends Base implements ViewInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-post-body-short';


    const DEFAULT_LENGTH = 10;


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var int
     */
    private $length = self::DEFAULT_LENGTH;


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

        try {
            /** @var ContextInterface $context */
            $context      = $this->giGetDi(ContextInterface::class);
            $this->length = $context->getLength();
        } catch (\Exception $e) {}
    }

    /**
     * @return ResourceRendererInterface
     */
    public function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return self
     */
    protected function setLength($length)
    {
        $this->length = $length;

        return $this;
    }
}