<?php

namespace Home\Component\Menu;

use GI\Component\Menu\AbstractMenu;
use Home\Component\Menu\Model\Model;

use Home\ServiceLocator\ServiceLocatorAwareTrait;

use Home\Component\Menu\Model\ModelInterface;

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