<?php

namespace Prime\Component\Menu\Model;

use GI\ClientContents\Menu\Menu;
use Prime\Component\Menu\I18n\Glossary;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use GI\ClientContents\Menu\Option\OptionInterface;
use Prime\Module\Call\Route\Tree\TreeInterface as RouteTreeInterface;
use Prime\Component\Menu\I18n\GlossaryInterface;

/**
 * Class Model
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

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,RouteTreeInterface::TYPE_DROPDOWN
        );
        $this->getDropdown()->setTitle($title)->setLink($this->primeGetRouteTree()->buildDropdown());

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'chain');
        $this->getChain()->setTitle($title)->setLinkToMock();

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,RouteTreeInterface::TYPE_COMMON
        );
        $this->getChain_Common()->setTitle($title)->setLink($this->primeGetRouteTree()->buildCommon());

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'advanced');
        $this->getChain_Advanced()->setTitle($title)->setLinkToMock();

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,RouteTreeInterface::TYPE_DASH
        );
        $this->getChain_Advanced_Dash()->setTitle($title)->setLink($this->primeGetRouteTree()->buildDash());

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,RouteTreeInterface::TYPE_SNAPSHOT
        );
        $this->getChain_Advanced_Snapshot()->setTitle($title)->setLink($this->primeGetRouteTree()->buildSnapshot());

        $title = $this->giTranslate(
            GlossaryInterface::class, Glossary::class,RouteTreeInterface::TYPE_WINGS
        );
        $this->getChain_Advanced_Wings()->setTitle($title)->setLink($this->primeGetRouteTree()->buildWings());
    }

    /**
     * @return array
     */
    protected function getDefaultContents()
    {
        return [
            'dropdown',
            'chain' => [
                'common',
                'advanced' => [
                    'dash',
                    'snapshot',
                    'wings'
                ]
            ],
        ];
    }

    /**
     * @return static
     */
    public function selectDropdown()
    {
        $this->getDropdown()->setSelected(true);

        return $this;
    }

    /**
     * @return static
     */
    public function selectCommon()
    {
        $this->getChain_Common()->selectRecursive(true);

        return $this;
    }

    /**
     * @return static
     */
    public function selectDash()
    {
        $this->getChain_Advanced_Dash()->selectRecursive(true);

        return $this;
    }

    /**
     * @return static
     */
    public function selectSnapshot()
    {
        $this->getChain_Advanced_Snapshot()->selectRecursive(true);

        return $this;
    }

    /**
     * @return static
     */
    public function selectWings()
    {
        $this->getChain_Advanced_Wings()->selectRecursive(true);

        return $this;
    }
}