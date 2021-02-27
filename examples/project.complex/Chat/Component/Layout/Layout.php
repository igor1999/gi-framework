<?php

namespace Chat\Component\Layout;

use GI\Component\Layout\AbstractLayout;
use Chat\Component\Layout\View\View;
use Chat\Component\Layout\I18n\Glossary;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Layout\View\ViewInterface;
use Chat\Component\Home\HomeInterface;
use Chat\Component\Conversation\ConversationInterface;
use Chat\Component\Layout\I18n\GlossaryInterface;

class Layout extends AbstractLayout implements LayoutInterface
{
    use ServiceLocatorAwareTrait;


    const HOME_TITLE         = 'Chat login';

    const CONVERSATION_TITLE = 'Chat';


    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * Layout constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->view = $this->giGetDi(ViewInterface::class, View::class);
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param HomeInterface $content
     * @return self
     * @throws \Exception
     */
    public function createHome(HomeInterface $content)
    {
        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,static::HOME_TITLE);

        $this->setTitle($title)->setContent($content);

        return $this;
    }

    /**
     * @param ConversationInterface $content
     * @return self
     * @throws \Exception
     */
    public function createConversation(ConversationInterface $content)
    {
        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,static::CONVERSATION_TITLE
        );

        $this->setTitle($title)->setContent($content);

        return $this;
    }
}