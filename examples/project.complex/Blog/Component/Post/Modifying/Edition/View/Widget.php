<?php

namespace Blog\Component\Post\Modifying\Edition\View;

use Blog\Component\Post\Modifying\Base\View\AbstractWidget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\DOM\HTML\Element\Input\Button\ButtonInterface;
use Blog\Component\Post\Modifying\Edition\ViewModel\ViewModelInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_JS  = 'blog-post-modifying-edition';

    const CLIENT_CSS = self::CLIENT_JS;


    const URI_ATTRIBUTE              = 'uri';

    const CONFIRMATION_TEXT_DATA_KEY = 'confirmation-text';


    /**
     * @var int
     */
    private $id;

    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var ButtonInterface
     */
    private $deleteButton;


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
    public function setId($id)
    {
        $this->id = $id;

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
     * @return ButtonInterface
     */
    public function getDeleteButton()
    {
        return $this->deleteButton;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function build()
    {
        parent::build();

        $uri = $this->blogGetRouteTree()->getPostTree()->buildExecuteDeleteWithId($this->id);
        $this->getServerDataList()
            ->set(static::CONFIRMATION_TEXT_DATA_KEY, $this->translate('Delete post?'))
            ->set(static::URI_ATTRIBUTE, $uri);

        $this->getForm()->setAction(
            $this->blogGetRouteTree()->getPostTree()->buildSaveEditWithId($this->id)
        );

        $this->getForm()->build(4, 2)
            ->set(0, 0, $this->getResultMessageContainer())
            ->set(1, 0, $this->getTitleInput())
            ->set(2, 0, $this->getTextInput())
            ->set(3, 0, $this->getSubmitButton())
            ->set(3, 1, $this->deleteButton);

        return $this;
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