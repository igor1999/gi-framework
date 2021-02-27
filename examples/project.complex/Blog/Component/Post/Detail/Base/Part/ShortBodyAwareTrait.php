<?php

namespace Blog\Component\Post\Detail\Base\Part;

use Blog\Component\Post\Body\Short\BodyInterface;

trait ShortBodyAwareTrait
{
    /**
     * @var BodyInterface
     */
    private $body;


    /**
     * @return BodyInterface
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param BodyInterface $body
     * @return self
     */
    public function setBody(BodyInterface $body)
    {
        $this->body = $body;

        return $this;
    }
}