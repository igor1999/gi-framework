<?php

namespace Blog\Component\Post\Modifying\Creation\View;

use Blog\Component\Post\Modifying\Base\View\AbstractWidget;

use Blog\Component\Post\Modifying\Creation\ViewModel\ViewModelInterface;
use GI\Component\Captcha\ImageText\ImageTextInterface as CaptchaImageTextInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    const CLIENT_JS  = 'blog-post-modifying-creation';

    const CLIENT_CSS = self::CLIENT_JS;


    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var CaptchaImageTextInterface
     */
    private $captchaComponent;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ViewModelInterface
     */
    protected function getViewModel()
    {
        return $this->viewModel;
    }

    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel)
    {
        $this->viewModel = $viewModel;

        return $this;
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function build()
    {
        parent::build();

        $this->getForm()->setAction($this->blogGetRouteTree()->getPostTree()->getSaveNew()->build());

        $this->getForm()->build(5, 1)
            ->set(0, 0, $this->getResultMessageContainer())
            ->set(1, 0, $this->getTitleInput())
            ->set(2, 0, $this->getTextInput())
            ->set(3, 0, $this->captchaComponent)
            ->set(4, 0, $this->getSubmitButton());

        return $this;
    }

    /**
     * @return CaptchaImageTextInterface
     */
    protected function getCaptchaComponent()
    {
        if (!($this->captchaComponent instanceof CaptchaImageTextInterface)) {
            $this->captchaComponent = $this->giGetComponentFactory()
                ->getCaptchaFactory()
                ->createImageText($this->getViewModel()->getCaptcha());
        }

        return $this->captchaComponent;
    }
}