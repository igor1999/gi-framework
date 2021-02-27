<?php

namespace Blog\Component\Post\Detail\Base\Part;

use Blog\Component\Post\Body\Short\BodyInterface;

interface ShortBodyAwareInterface
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