<?php

namespace Blog\Email\NewComment;

use GI\Email\Controller\AbstractController;
use Blog\Email\Context\Context as GlobalContext;
use Blog\Email\NewComment\I18n\Glossary;
use GI\FileSystem\ContentTypes;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface;
use Blog\Email\Context\ContextInterface as GlobalContextInterface;
use Blog\Email\NewComment\I18n\GlossaryInterface;
use GI\Util\TextProcessing\MarkupTextProcessor\MarkupTextProcessorInterface;

class NewComment extends AbstractController implements NewCommentInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE_TEMPLATE       = 'New comment to your post "%s"';

    const DEFAULT_TITLE_LENGTH = 50;


    /**
     * @var RecordInterface
     */
    private $record;

    /**
     * @var GlobalContextInterface
     */
    private $globalContext;

    /**
     * @var MarkupTextProcessorInterface
     */
    private $textProcessor;


    /**
     * NewComment constructor.
     * @param RecordInterface $record
     * @throws \Exception
     */
    public function __construct(RecordInterface $record)
    {
        parent::__construct();

        $this->record =$record;

        $this->globalContext = $this->giGetDi(GlobalContextInterface::class, GlobalContext::class);

        $this->textProcessor = $this->giCreateMarkupTextProcessor();
    }

    /**
     * @return RecordInterface
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @return GlobalContextInterface
     */
    protected function getGlobalContext()
    {
        return $this->globalContext;
    }

    /**
     * @return MarkupTextProcessorInterface
     */
    protected function getTextProcessor()
    {
        return $this->textProcessor;
    }

    /**
     * @return self
     * @throws \Exception
     */
    protected function reset()
    {
        parent::reset();

        $this->getEmail()->getHeader()->setFrom($this->getGlobalContext()->getAdminEmail());

        return $this;
    }

    /**
     * @throws \Exception
     */
    protected function validate()
    {
        if ($this->getRecord()->getAuthorID() == $this->getRecord()->getPost()->getAuthorID()) {
            throw new \Exception('This comment written by post author');
        }
    }

    /**
     * @param string $text
     * @return string
     */
    protected function translate($text)
    {
        return $this->giTranslate(GlossaryInterface::class, Glossary::class, $text);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getSubject()
    {
        $title = $this->getRecord()->getPost()->getTitle();
        $title = $this->getTextProcessor()->setText($title)->cutAsString(static::DEFAULT_TITLE_LENGTH)->getText();

        return sprintf($this->translate(static::TITLE_TEMPLATE), $title);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getText()
    {
        $title = $this->getTextProcessor()->getEscaper()->escape($this->getRecord()->getPost()->getTitle());
        $text = $this->getTextProcessor()->getEscaper()->escape($this->getRecord()->getText());

        return <<<END
{$this->translate('Dear')} {$this->getRecord()->getPost()->getUser()->getLogin()},

{$this->translate('New comment was added to your post')} "{$title}"

{$this->translate('Author')}: {$this->getRecord()->getUser()->getLogin()}

{$this->translate('Date')}: {$this->getRecord()->getCreateAt()}

{$this->translate('Text')}:

{$text}

{$this->translate('Best Regards')}
END;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function send()
    {
        $this->validate();

        $this->reset();

        $this->getEmail()->getHeader()->getTo()->createAndAdd($this->getRecord()->getPost()->getUser()->getEmail());
        $this->getEmail()->getHeader()->getCustomHeaders()->addContentType(ContentTypes::HTML);
        $this->getEmail()->getHeader()->setSubject($this->getSubject());
        $this->getEmail()->getBody()->appendText($this->getText());

        return parent::send();
    }
}