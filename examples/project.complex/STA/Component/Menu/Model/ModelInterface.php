<?php

namespace STA\Component\Menu\Model;

use GI\ClientContents\Menu\MenuInterface;
use GI\ClientContents\Menu\Option\OptionInterface;

/**
 * Interface ModelInterface
 * @package STA\Component\Menu\Model
 *
 * @method OptionInterface getSwitchers()
 */
interface ModelInterface extends MenuInterface
{
    /**
     * @return static
     */
    public function selectSwitchers();
}