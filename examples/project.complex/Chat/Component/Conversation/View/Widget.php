<?php

namespace Chat\Component\Conversation\View;

use GI\Component\Base\View\Widget\AbstractWidget;
use Chat\Component\Conversation\View\Messages\Messages;
use Chat\Module\DI\GI\SocketDemon\Socket\Server\Context\Context as ServerSocketContext;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;
use Chat\Component\Conversation\I18n\I18nAwareTrait;

use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\Input\Button\ButtonInterface;
use Chat\Component\Conversation\View\Messages\MessagesInterface;
use Chat\Module\DI\GI\SocketDemon\Socket\Server\Context\ContextInterface as ServerSocketContextInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait, I18nAwareTrait;


    const CLIENT_CSS = 'chat-conversation';

    const CLIENT_JS  = self::CLIENT_CSS;


    const DATA_KEY_MESSAGES = 'messages';

    const DATA_KEY_HOST     = 'host';

    const DATA_KEY_PORT     = 'port';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var MessagesInterface
     */
    private $messages;

    /**
     * @var ServerSocketContextInterface
     */
    private $serverContext;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );

        $this->messages = $this->giGetDi(MessagesInterface::class, Messages::class);

        $this->serverContext = $this->giGetDi(
            ServerSocketContextInterface::class, ServerSocketContext::class
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
     * @return MessagesInterface
     */
    protected function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return ServerSocketContextInterface
     */
    protected function getServerContext()
    {
        return $this->serverContext;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function build()
    {
        $this->getServerDataList()
            ->addSessionId()
            ->escapeAndSet(static::DATA_KEY_MESSAGES, $this->getMessages()->getJSON())
            ->set(static::DATA_KEY_HOST, $this->giGetServer()->getHttpHost())
            ->set(static::DATA_KEY_PORT, $this->getServerContext()->getPort());

        $this->container->build(4, 1)
            ->set(0, 0, $this->board)
            ->set(1, 0, $this->messageContainer)
            ->set(2, 0, $this->textbox)
            ->set(3, 0, $this->sendButton);

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
     * @gi-id board
     * @return DivInterface
     */
    protected function createBoard()
    {
        $this->board = $this->giGetDOMFactory()->createDiv();

        return $this->board;
    }

    /**
     * @gi-id message-container
     * @return DivInterface
     */
    protected function createMessageContainer()
    {
        $this->messageContainer = $this->giGetDOMFactory()->createDiv();

        return $this->messageContainer;
    }

    /**
     * @gi-id textbox
     * @return TextAreaInterface
     */
    protected function createTextInput()
    {
        $this->textbox = $this->giGetDOMFactory()->createTextArea();

        $this->textbox->getAttributes()->setPlaceholder($this->translate('your message'));

        return $this->textbox;
    }

    /**
     * @gi-id send-button
     * @return ButtonInterface
     */
    protected function createSubmitButton()
    {
        $this->sendButton = $this->giGetDOMFactory()->getInputFactory()->createButton(
            [], $this->translate('send!')
        );

        $this->sendButton->getAttributes()->setDisabled(true);

        return $this->sendButton;
    }
}