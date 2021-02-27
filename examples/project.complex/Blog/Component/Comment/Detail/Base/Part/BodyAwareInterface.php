<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Body\BodyInterface;

interface BodyAwareInterface
{
    /**
     * @return BodyInterface
     */
    public function getBody();

    /**
     * @param BodyInterface $body
     * @return self
     */
    public function setBody(BodyInterface $body);
}