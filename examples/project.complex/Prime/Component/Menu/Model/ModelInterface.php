<?php

namespace Prime\Component\Menu\Model;

use GI\ClientContents\Menu\MenuInterface;
use GI\ClientContents\Menu\Option\OptionInterface;

/**
 * Interface ModelInterface
 * @package Prime\Component\Menu\Model
 *
 * @method OptionInterface getDropdown()
 * @method OptionInterface getChain()()
 * @method OptionInterface getChain_Common()()
 * @method OptionInterface getChain_Advanced()()
 * @method OptionInterface getChain_Advanced_Dash()()
 * @method OptionInterface getChain_Advanced_Snapshot()()
 * @method OptionInterface getChain_Advanced_Wings()()
 */
interface ModelInterface extends MenuInterface
{
    /**
     * @return static
     */
    public function selectDropdown();

    /**
     * @return static
     */
    public function selectCommon();

    /**
     * @return static
     */
    public function selectDash();

    /**
     * @return static
     */
    public function selectSnapshot();

    /**
     * @return static
     */
    public function selectWings();
}