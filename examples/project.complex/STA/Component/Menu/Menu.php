<?php

namespace STA\Component\Menu;

use GI\Component\Menu\AbstractMenu;
use STA\Component\Menu\Model\Model;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use STA\Component\Menu\Model\ModelInterface;

/**
 * Class Menu
 * @package STA\Component\Menu
 *
 * @method MenuInterface selectSwitchers()
 */
class Menu extends AbstractMenu implements MenuInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ModelInterface
     */
    private $menuModel;


    /**
     * Menu constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->menuModel = $this->giGetDi(ModelInterface::class, Model::class);
    }

    /**
     * @return ModelInterface
     */
    protected function getMenuModel()
    {
        return $this->menuModel;
    }
}