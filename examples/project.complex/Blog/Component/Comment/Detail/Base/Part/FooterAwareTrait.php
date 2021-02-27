<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Footer\FooterInterface;

trait FooterAwareTrait
{
    /**
     * @var FooterInterface
     */
    private $footer;


    /**
     * @return FooterInterface
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param FooterInterface $footer
     * @return self
     */
    public function setFooter(FooterInterface $footer)
    {
        $this->footer = $footer;

        return $this;
    }
}