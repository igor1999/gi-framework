<?php

namespace Prime\Component\Menu;

use GI\Component\Menu\AbstractMenu;
use Prime\Component\Menu\Model\Model;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Menu\Model\ModelInterface;
use Prime\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;

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

    /**
     * @param string $type
     * @return self
     * @throws \Exception
     */
    public function select(string $type)
    {
        switch ($type) {
            case RouteTreeInterface::TYPE_DROPDOWN:
                $this->getMenuModel()->selectDropdown();
                break;
            case RouteTreeInterface::TYPE_COMMON:
                $this->getMenuModel()->selectCommon();
                break;
            case RouteTreeInterface::TYPE_DASH:
                $this->getMenuModel()->selectDash();
                break;
            case RouteTreeInterface::TYPE_SNAPSHOT:
                $this->getMenuModel()->selectSnapshot();
                break;
            case RouteTreeInterface::TYPE_WINGS:
                $this->getMenuModel()->selectWings();
                break;
            default:
                $this->giThrowNotFoundException('Menu type', $type);
        }

        return $this;
    }
}