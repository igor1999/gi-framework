<?php

namespace Prime\Component\Menu;

use GI\Component\Menu\MenuInterface as BaseInterface;

interface MenuInterface extends BaseInterface
{
    /**
     * @param string $type
     * @return self
     * @throws \Exception
     */
    public function select(string $type);
}