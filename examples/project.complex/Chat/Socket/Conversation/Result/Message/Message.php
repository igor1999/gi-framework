<?php

namespace Chat\Socket\Conversation\Result\Message;

use GI\SocketDemon\Exchange\Response\Result\Base\Author\AbstractAuthor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Util\TextProcessing\Escaper\HTMLText\EscaperInterface;

class Message extends AbstractAuthor implements MessageInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE = 'message';


    /**
     * @var string
     */
    private $text;

    /**
     * @var EscaperInterface
     */
    private $escaper;


    /**
     * Message constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        parent::__construct();

        $this->text = $text;

        $this->escaper = $this->giGetEscaperFactory()->createHTMLText();
    }

    /**
     * @return EscaperInterface
     */
    public function getEscaper()
    {
        return $this->escaper;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @extract text
     * @return string
     */
    public function getEscapedText()
    {
        return $this->getEscaper()->escape($this->text);
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }
}