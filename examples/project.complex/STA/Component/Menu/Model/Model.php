<?php

namespace STA\Component\Menu\Model;

use GI\ClientContents\Menu\Menu;
use STA\Component\Menu\I18n\Glossary;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use GI\ClientContents\Menu\Option\OptionInterface;
use STA\Component\Menu\I18n\GlossaryInterface;

/**
 * Class Model
 * @package STA\Component\Menu\Model
 *
 * @method OptionInterface getSwitchers()
 */
class Model extends Menu implements ModelInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'switchers');

        $this->getSwitchers()->setTitle($title)->setLink( $this->staGetRouteTree()->getSwitchers()->build());
    }

    /**
     * @return static
     */
    public function selectSwitchers()
    {
        $this->getSwitchers()->setSelected(true);

        return $this;
    }

    /**
     * @return array
     */
    protected function getDefaultContents()
    {
        return [
            'switchers'
        ];
    }
}