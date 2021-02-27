<?php

namespace Blog\Component\Comment\Detail\Base\Part;

use Blog\Component\Comment\Footer\FooterInterface;

interface FooterAwareInterface
{
    /**
     * @return FooterInterface
     */
    public function getFooter();

    /**
     * @param FooterInterface $footer
     * @return self
     */
    public function setFooter(FooterInterface $footer);
}