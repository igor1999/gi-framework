<?php

namespace Chat\Component\Conversation\View\Messages;

use GI\SocketDemon\Exchange\Response\Messages\AbstractMessages as Base;
use Chat\Component\Conversation\I18n\Glossary;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Component\Conversation\I18n\GlossaryInterface;

class Messages extends Base implements MessagesInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @param string $text
     * @return string
     */
    protected function translate(string $text)
    {
        return $this->giTranslate(GlossaryInterface::class, Glossary::class, $text);
    }

    /**
     * @extract
     * @return string
     */
    protected function getMessage()
    {
        return $this->translate('<b>{author}:</b> {text}');
    }

    /**
     * @extract
     * @return string
     */
    protected function getJoin()
    {
        return $this->translate('<b>{author}</b> joins chat');
    }

    /**
     * @extract
     * @return string
     */
    protected function getLeave()
    {
        return $this->translate('<b>{author}</b> leaves chat');
    }

    /**
     * @extract
     * @return string
     */
    protected function getRefresh()
    {
        return $this->translate('To continue chat, please refresh the site');
    }
}