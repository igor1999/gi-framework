<?php

namespace Home\Component\Menu\Model;

use GI\ClientContents\Menu\MenuInterface;
use GI\ClientContents\Menu\Option\OptionInterface;

/**
 * Interface ModelInterface
 * @package Home\Component\Menu\Model
 *
 * @method OptionInterface getPrime()
 * @method OptionInterface getI18nTest()
 * @method OptionInterface getBlog()
 * @method OptionInterface getSta()
 * @method OptionInterface getMicro()
 */
interface ModelInterface extends MenuInterface
{

}