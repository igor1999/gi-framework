<?php

namespace Blog\Component\Post\Detail\Base\Part;

use Blog\Component\Post\Body\Full\BodyInterface;

interface FullBodyAwareInterface
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