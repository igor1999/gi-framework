<?php

namespace Blog\Component\Comment\Usecase\Removing\View\Widget;

use GI\Component\Base\View\Widget\AbstractWidget as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\I18n\I18nAwareTrait;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait, I18nAwareTrait;


    const CLIENT_JS  = 'blog-comment-modifying-removing';

    const CLIENT_CSS = 'blog-comment-modifying-removing-widget';


    const URI_ATTRIBUTE               = 'uri';

    const CONFIRMATION_TEXT_ATTRIBUTE = 'confirmation-text';


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
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
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
        $text = $this->translate('Delete comment?');
        $uri  = $this->blogGetRouteTree()->getCommentTree()->buildExecuteDeleteWithId($this->id);
        $this->getServerDataList()
            ->set(static::CONFIRMATION_TEXT_ATTRIBUTE, $text)
            ->set(static::URI_ATTRIBUTE, $uri);

        $this->container->build(1, 1)
            ->set(0, 0, $this->deleteButton);

        return $this;
    }

    /**
     * @render
     * @gi-id container
     * @return LayoutInterface
     */
    protected function createContainer()
    {
        $this->container = $this->giGetDOMFactory()->createLayout();

        return $this->container;
    }

    /**
     * @gi-id delete-button
     * @return ButtonInterface
     * @throws \Exception
     */
    protected function createDeleteButton()
    {
        $this->deleteButton = $this->giGetDOMFactory()->getInputFactory()->createButton(
            [], $this->translate('delete!')
        );

        return $this->deleteButton;
    }
}