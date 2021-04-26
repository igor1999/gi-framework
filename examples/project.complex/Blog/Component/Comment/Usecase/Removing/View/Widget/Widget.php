<?php

namespace Blog\Component\Comment\Usecase\Removing\View\Widget;

use GI\Component\Base\View\Widget\AbstractWidget as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Comment\I18n\I18nAwareTrait;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;

class Widget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_JS  = 'blog-comment-modifying-removing';

    const CLIENT_CSS = 'blog-comment-modifying-removing-widget';


    const URI_ATTRIBUTE               = 'uri';

    const CONFIRMATION_TEXT_ATTRIBUTE = 'confirmation-text';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var int
     */
    private $id;

    /**
     * @var LayoutInterface
     */
    private $container;

    /**
     * @var ButtonInterface
     */
    private $deleteButton;


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
     * @return int
     */
    protected function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
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
    protected function getContainer()
    {
        if (!($this->container instanceof LayoutInterface)) {
            $this->container = $this->giGetDOMFactory()->createLayout();
        }

        return $this->container;
    }

    /**
     * @gi-id delete-button
     * @return ButtonInterface
     * @throws \Exception
     */
    protected function getDeleteButton()
    {
        if (!($this->deleteButton instanceof ButtonInterface)) {
            $this->deleteButton = $this->giGetDOMFactory()->getInputFactory()->createButton(
                [], $this->translate('delete!')
            );
        }

        return $this->deleteButton;
    }
}