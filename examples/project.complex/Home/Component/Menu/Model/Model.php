<?php

namespace Home\Component\Menu\Model;

use GI\ClientContents\Menu\Menu;
use Home\Component\Menu\Model\Context\Context;
use Home\Component\Menu\I18n\Glossary;

use Home\ServiceLocator\ServiceLocatorAwareTrait as HomeServiceLocatorAwareTrait;
use Prime\ServiceLocator\ServiceLocatorAwareTrait as PrimeServiceLocatorAwareTrait;
use I18nTest\ServiceLocator\ServiceLocatorAwareTrait as I18nTestServiceLocatorAwareTrait;
use Blog\ServiceLocator\ServiceLocatorAwareTrait as BlogServiceLocatorAwareTrait;
use STA\ServiceLocator\ServiceLocatorAwareTrait as STAServiceLocatorAwareTrait;

use GI\ClientContents\Menu\Option\OptionInterface;
use Home\Component\Menu\Model\Context\ContextInterface;
use Home\Component\Menu\I18n\GlossaryInterface;

/**
 * Class Model
 * @package Home\Component\Menu\Model
 *
 * @method OptionInterface getPrime()
 * @method OptionInterface getI18nTest()
 * @method OptionInterface getBlog()
 * @method OptionInterface getSta()
 * @method OptionInterface getMicro()
 */
class Model extends Menu implements ModelInterface
{
    use HomeServiceLocatorAwareTrait,
        PrimeServiceLocatorAwareTrait,
        I18nTestServiceLocatorAwareTrait,
        BlogServiceLocatorAwareTrait,
        STAServiceLocatorAwareTrait;


    /**
     * Model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'Prime');
        $this->getPrime()->setTitle($title)->setLink($this->primeGetRouteTree()->buildDropdown());

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'I18n test');
        $this->getI18nTest()->setTitle($title)->setLink($this->i18nTestGetRouteTree()->getRoot()->build());

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'Blog');
        $link  = $this->blogGetRouteTree()->getPostTree()->getFeed()->build();
        $this->getBlog()->setTitle($title)->setLink($link);

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'STA');
        $link  = $this->staGetRouteTree()->getSwitchers()->build();
        $this->getSta()->setTitle($title)->setLink($link);

        $title = $this->giTranslate(GlossaryInterface::class, Glossary::class,'Micro');
        /** @var ContextInterface $context */
        $context = $this->giGetDi(ContextInterface::class, Context::class);
        $this->getMicro()->setTitle($title)->setLink($context->getLinkToMicro());
    }

    /**
     * @return array
     */
    protected function getDefaultContents()
    {
        return [
            'prime',
            'i18n-test',
            'blog',
            'sta',
            'micro',
        ];
    }
}