<?php

namespace Blog\Component\Comment\Detail\Base;

use GI\Component\Base\AbstractComponent;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\Component\Comment\Detail\Base\Part\HeaderAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Comment\Detail\Base\Part\BodyAwareInterface;

abstract class AbstractDetail extends AbstractComponent implements DetailInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var CommentRecordInterface
     */
    private $comment;


    /**
     * AbstractDetail constructor.
     * @param CommentRecordInterface $comment
     */
    public function __construct(CommentRecordInterface $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return CommentRecordInterface
     */
    protected function getComment()
    {
        return $this->comment;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $view = $this->getView();

        if (($this instanceof HeaderAwareInterface) && ($view instanceof HeaderAwareInterface)) {
            $view->setHeader($this->getHeader());
        }

        if (($this instanceof FooterAwareInterface) && ($view instanceof FooterAwareInterface)) {
            $view->setFooter($this->getFooter());
        }

        if (($this instanceof BodyAwareInterface) && ($view instanceof BodyAwareInterface)) {
            $view->setBody($this->getBody());
        }

        return $view->toString();
    }
}