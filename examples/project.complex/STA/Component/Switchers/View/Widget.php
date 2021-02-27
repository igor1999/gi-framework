<?php

namespace STA\Component\Switchers\View;

use GI\Component\Base\View\Widget\AbstractWidget;
use STA\Component\Switchers\I18n\Glossary;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use STA\Component\Switchers\I18n\GlossaryInterface;

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
    protected function createMainFieldset()
    {
        $this->mainFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Switchers')
        );

        return $this->mainFieldset;
    }

    /**
     * @gi-id gender-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function createGenderFieldset()
    {
        $this->genderFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Gender')
        );

        return $this->genderFieldset;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createGender2Switcher()
    {
        $this->gender2Switcher = $this->giGetComponentFactory()->getSwitcherFactory()->createGender(['gender2']);
        $this->gender2Switcher->getSelection()->selectMale();

        return $this;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createGender3Switcher()
    {
        $this->gender3Switcher = $this->giGetComponentFactory()->getSwitcherFactory()->createGender(['gender3']);
        $this->gender3Switcher->getSelection()->addOthers()->selectOthers();

        return $this;
    }

    /**
     * @gi-id on-off-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function createOnOffFieldset()
    {
        $this->onOffFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'On/Off')
        );

        return $this->onOffFieldset;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createOnOffSwitcher()
    {
        $this->onOffSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createOnOff(['onOff']);
        $this->onOffSwitcher->getSelection()->selectOn();

        return $this;
    }

    /**
     * @gi-id salutation-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function createSalutationFieldset()
    {
        $this->salutationFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Salutation')
        );

        return $this->salutationFieldset;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createSalutationSwitcher()
    {
        $this->salutationSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createSalutation(
            ['salutation']
        );
        $this->salutationSwitcher->getSelection()->selectMr();

        return $this;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createSalutationUnknownSwitcher()
    {
        $this->salutationUnknownSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createSalutation(
            ['salutationUnknown']
        );
        $this->salutationUnknownSwitcher->getSelection()->addUnknown()->selectUnknown();

        return $this;
    }

    /**
     * @gi-id yes-no-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function createYesNoFieldset()
    {
        $this->yesNoFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Yes/No')
        );

        return $this->yesNoFieldset;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createYesNoSwitcher()
    {
        $this->yesNoSwitcher = $this->giGetComponentFactory()->getSwitcherFactory()->createYesNo(['yesNo']);
        $this->yesNoSwitcher->getSelection()->selectYes();

        return $this;
    }

    /**
     * @gi-id custom-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function createCustomFieldset()
    {
        $this->customFieldset = $this->giGetDOMFactory()->createFieldsetLayout(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Custom (State)')
        );

        return $this->customFieldset;
    }

    /**
     * @create
     * @return self
     * @throws \Exception
     */
    protected function createState()
    {
        $this->state = $this->staGetComponentFactory()->createState(['state']);
        $this->state->getSelection()->selectSafe();

        return $this;
    }
}