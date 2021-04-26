<?php

namespace STA\Component\Switchers\View;

use GI\Component\Base\View\Widget\AbstractWidget;
use STA\Component\Switchers\I18n\Glossary;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use STA\Component\Switchers\I18n\GlossaryInterface;
use GI\Component\Switcher\Gender\GenderInterface;
use GI\Component\Switcher\OnOff\OnOffInterface;
use GI\Component\Switcher\Salutation\SalutationInterface;
use GI\Component\Switcher\YesNo\YesNoInterface;
use STA\Component\Switchers\State\StateInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait;


    const CLIENT_CSS = 'sta-switchers';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * Widget constructor.
     * @throws \Exception
    */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return static
     * @throws \Exception
     */
    protected function build()
    {
        $this->genderFieldset->build(1, 2)
            ->set(0, 0, $this->gender2Switcher)
            ->set(0, 1, $this->gender3Switcher);

        $this->onOffFieldset->build(1, 1)
            ->set(0, 0, $this->onOffSwitcher);

        $this->salutationFieldset->build(1, 2)
            ->set(0, 0, $this->salutationSwitcher)
            ->set(0, 1, $this->salutationUnknownSwitcher);

        $this->yesNoFieldset->build(1, 1)
            ->set(0, 0, $this->yesNoSwitcher);

        $this->customFieldset->build(1, 1)
            ->set(0, 0, $this->state);

        $this->mainFieldset->build(5, 1)
            ->set(0, 0, $this->genderFieldset)
            ->set(1, 0, $this->onOffFieldset)
            ->set(2, 0, $this->salutationFieldset)
            ->set(3, 0, $this->yesNoFieldset)
            ->set(4, 0, $this->customFieldset);

        return $this;
    }

    /**
     * @render
     * @gi-id main-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getMainFieldset()
    {
        if (!($this->mainFieldset instanceof FieldsetLayoutInterface)) {
            $this->mainFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Switchers')
            );
        }

        return $this->mainFieldset;
    }

    /**
     * @gi-id gender-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getGenderFieldset()
    {
        if (!($this->genderFieldset instanceof FieldsetLayoutInterface)) {
            $this->genderFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Gender')
            );
        }

        return $this->genderFieldset;
    }

    /**
     * @create
     * @return GenderInterface
     * @throws \Exception
     */
    protected function getGender2Switcher()
    {
        if (!($this->gender2Switcher instanceof FieldsetLayoutInterface)) {
            $this->gender2Switcher = $this->giGetComponentFactory()->getSwitcherFactory()->createGender(['gender2']);
            $this->gender2Switcher->getSelection()->selectMale();
        }

        return $this->gender2Switcher;
    }

    /**
     * @create
     * @return GenderInterface
     * @throws \Exception
     */
    protected function getGender3Switcher()
    {
        if (!($this->gender3Switcher instanceof GenderInterface)) {
            $this->gender3Switcher = $this->giGetComponentFactory()->getSwitcherFactory()->createGender(['gender3']);
            $this->gender3Switcher->getSelection()->addOthers()->selectOthers();
        }

        return $this->gender3Switcher;
    }

    /**
     * @gi-id on-off-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getOnOffFieldset()
    {
        if (!($this->onOffFieldset instanceof FieldsetLayoutInterface)) {
            $this->onOffFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'On/Off')
            );
        }

        return $this->onOffFieldset;
    }

    /**
     * @create
     * @return OnOffInterface
     * @throws \Exception
     */
    protected function getOnOffSwitcher()
    {
        if (!($this->onOffSwitcher instanceof OnOffInterface)) {
            $this->onOffSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createOnOff(['onOff']);
            $this->onOffSwitcher->getSelection()->selectOn();
        }

        return $this->onOffSwitcher;
    }

    /**
     * @gi-id salutation-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getSalutationFieldset()
    {
        if (!($this->salutationFieldset instanceof FieldsetLayoutInterface)) {
            $this->salutationFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Salutation')
            );
        }

        return $this->salutationFieldset;
    }

    /**
     * @create
     * @return SalutationInterface
     * @throws \Exception
     */
    protected function getSalutationSwitcher()
    {
        if (!($this->salutationSwitcher instanceof SalutationInterface)) {
            $this->salutationSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createSalutation(
                ['salutation']
            );
            $this->salutationSwitcher->getSelection()->selectMr();
        }

        return $this->salutationSwitcher;
    }

    /**
     * @create
     * @return SalutationInterface
     * @throws \Exception
     */
    protected function getSalutationUnknownSwitcher()
    {
        if (!($this->salutationUnknownSwitcher instanceof SalutationInterface)) {
            $this->salutationUnknownSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createSalutation(
                ['salutationUnknown']
            );
            $this->salutationUnknownSwitcher->getSelection()->addUnknown()->selectUnknown();
        }

        return $this->salutationUnknownSwitcher;
    }

    /**
     * @gi-id yes-no-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getYesNoFieldset()
    {
        if (!($this->yesNoFieldset instanceof FieldsetLayoutInterface)) {
            $this->yesNoFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Yes/No')
            );
        }

        return $this->yesNoFieldset;
    }

    /**
     * @create
     * @return YesNoInterface
     * @throws \Exception
     */
    protected function getYesNoSwitcher()
    {
        if (!($this->yesNoSwitcher instanceof YesNoInterface)) {
            $this->yesNoSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createYesNo(['yesNo']);
            $this->yesNoSwitcher->getSelection()->selectYes();
        }

        return $this->yesNoSwitcher;
    }

    /**
     * @gi-id custom-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getCustomFieldset()
    {
        if (!($this->customFieldset instanceof FieldsetLayoutInterface)) {
            $this->customFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
                $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Custom (State)')
            );
        }

        return $this->customFieldset;
    }

    /**
     * @create
     * @return StateInterface
     * @throws \Exception
     */
    protected function getState()
    {
        if (!($this->state instanceof StateInterface)) {
            $this->state = $this->staGetComponentFactory()->createState(['state']);
            $this->state->getSelection()->selectSafe();
        }

        return $this->state;
    }
}