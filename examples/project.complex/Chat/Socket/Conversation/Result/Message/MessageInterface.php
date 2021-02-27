<?php

namespace Chat\Socket\Conversation\Result\Message;

use GI\SocketDemon\Exchange\Response\Result\Base\Author\AuthorInterface;

use GI\Util\TextProcessing\Escaper\HTMLText\EscaperInterface;

interface MessageInterface extends AuthorInterface
{
    /**
     * @return EscaperInterface
     */
    public function getEscaper();

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text);
}