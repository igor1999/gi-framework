<?php

namespace Blog\Component\Post\Detail\Base;

use GI\Component\Base\AbstractComponent;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Detail\Base\Part\HeaderAwareInterface;
use Blog\Component\Post\Detail\Base\Part\FooterAwareInterface;
use Blog\Component\Post\Detail\Base\Part\FullBodyAwareInterface;
use Blog\Component\Post\Detail\Base\Part\ShortBodyAwareInterface;

abstract class AbstractDetail extends AbstractComponent implements DetailInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var PostRecordInterface
     */
    private $post;


    /**
     * Footerless constructor.
     * @param PostRecordInterface $post
     */
    public function __construct(PostRecordInterface $post)
    {
        $this->post = $post;
    }

    /**
     * @return PostRecordInterface
     */
    protected function getPost()
    {
        return $this->post;
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

        if (($this instanceof FullBodyAwareInterface) && ($view instanceof FullBodyAwareInterface)) {
            $view->setBody($this->getBody());
        }

        if (($this instanceof ShortBodyAwareInterface) && ($view instanceof ShortBodyAwareInterface)) {
            $view->setBody($this->getBody());
        }

        return $view->toString();
    }
}