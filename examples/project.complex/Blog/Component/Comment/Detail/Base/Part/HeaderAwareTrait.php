<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Header\HeaderInterface;

trait HeaderAwareTrait
{
    /**
     * @var HeaderInterface
     */
    private $header;


    /**
     * @return HeaderInterface
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param HeaderInterface $header
     * @return self
     */
    public function setHeader(HeaderInterface $header)
    {
        $this->header = $header;

        return $this;
    }
}