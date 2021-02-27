<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Body\BodyInterface;

trait BodyAwareTrait
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