<?php

namespace STA\Component\Switchers\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use GI\Component\Switcher\Gender\GenderInterface;
use GI\Component\Switcher\OnOff\OnOffInterface;
use GI\Component\Switcher\Salutation\SalutationInterface;
use GI\Component\Switcher\YesNo\YesNoInterface;
use STA\Component\Switchers\State\StateInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @return FieldsetLayoutInterface
     */
    public function getMainFieldset();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getGenderFieldset();

    /**
     * @return GenderInterface
     */
    public function getGender2Switcher();

    /**
     * @return GenderInterface
     */
    public function getGender3Switcher();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getOnOffFieldset();

    /**
     * @return OnOffInterface
     */
    public function getOnOffSwitcher();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getSalutationFieldset();

    /**
     * @return SalutationInterface
     */
    public function getSalutationSwitcher();

    /**
     * @return SalutationInterface
     */
    public function getSalutationUnknownSwitcher();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getYesNoFieldset();

    /**
     * @return YesNoInterface
     */
    public function getYesNoSwitcher();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getCustomFieldset();

    /**
     * @return StateInterface
     */
    public function getState();
}