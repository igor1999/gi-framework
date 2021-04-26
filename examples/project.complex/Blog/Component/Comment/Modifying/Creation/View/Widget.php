<?php

namespace Blog\Component\Comment\Modifying\Creation\View;

use Blog\Component\Comment\Modifying\Base\View\AbstractWidget;

use Blog\Component\Comment\Modifying\Creation\ViewModel\ViewModelInterface;
use GI\Component\Captcha\ImageText\ImageTextInterface as CaptchaImageTextInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    const CLIENT_JS  = 'blog-comment-modifying-creation';

    const CLIENT_CSS = self::CLIENT_JS;


    /**
     * @var int
     */
    private $postID;

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
     * @return int
     */
    protected function getPostID()
    {
        return $this->postID;
    }

    /**
     * @param int $postID
     * @return self
     */
    public function setPostID(int $postID)
    {
        $this->postID = $postID;

        return $this;
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

        $this->getForm()->setAction(
            $this->blogGetRouteTree()->getCommentTree()->buildSaveNewWithPostID($this->getPostID())
        );

        $this->getForm()->build(4, 1)
            ->set(0, 0, $this->getResultMessageContainer())
            ->set(1, 0, $this->getTextInput())
            ->set(2, 0, $this->captchaComponent)
            ->set(3, 0, $this->getSubmitButton());

        return $this;
    }

    /**
     * @create
     * @return CaptchaImageTextInterface
     */
    protected function getCaptchaComponent()
    {
        if (!($this->captchaComponent instanceof CaptchaImageTextInterface)) {
            $this->captchaComponent = $this->giGetComponentFactory()
                ->getCaptchaFactory()
                ->createImageText($this->viewModel->getCaptcha());
        }

        return $this->captchaComponent;
    }
}