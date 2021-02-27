<?php

namespace STA\Component\Switchers\View;

use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use GI\Component\Switcher\Gender\GenderInterface;
use GI\Component\Switcher\OnOff\OnOffInterface;
use GI\Component\Switcher\Salutation\SalutationInterface;
use GI\Component\Switcher\YesNo\YesNoInterface;
use STA\Component\Switchers\State\StateInterface;

trait ContentsTrait
{
    /**
     * @var FieldsetLayoutInterface
     */
    private $mainFieldset;

    /**
     * @var FieldsetLayoutInterface
     */
    private $genderFieldset;

    /**
     * @var GenderInterface
     */
    private $gender2Switcher;

    /**
     * @var GenderInterface
     */
    private $gender3Switcher;

    /**
     * @var FieldsetLayoutInterface
     */
    private $onOffFieldset;

    /**
     * @var OnOffInterface
     */
    private $onOffSwitcher;

    /**
     * @var FieldsetLayoutInterface
     */
    private $salutationFieldset;

    /**
     * @var SalutationInterface
     */
    private $salutationSwitcher;

    /**
     * @var SalutationInterface
     */
    private $salutationUnknownSwitcher;

    /**
     * @var FieldsetLayoutInterface
     */
    private $yesNoFieldset;

    /**
     * @var YesNoInterface
     */
    private $yesNoSwitcher;

    /**
     * @var FieldsetLayoutInterface
     */
    private $customFieldset;

    /**
     * @var StateInterface
     */
    private $state;


    /**
     * @return FieldsetLayoutInterface
     */
    public function getMainFieldset()
    {
        return $this->mainFieldset;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getGenderFieldset()
    {
        return $this->genderFieldset;
    }

    /**
     * @return GenderInterface
     */
    public function getGender2Switcher()
    {
        return $this->gender2Switcher;
    }

    /**
     * @return GenderInterface
     */
    public function getGender3Switcher()
    {
        return $this->gender3Switcher;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getOnOffFieldset()
    {
        return $this->onOffFieldset;
    }

    /**
     * @return OnOffInterface
     */
    public function getOnOffSwitcher()
    {
        return $this->onOffSwitcher;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getSalutationFieldset()
    {
        return $this->salutationFieldset;
    }

    /**
     * @return SalutationInterface
     */
    public function getSalutationSwitcher()
    {
        return $this->salutationSwitcher;
    }

    /**
     * @return SalutationInterface
     */
    public function getSalutationUnknownSwitcher()
    {
        return $this->salutationUnknownSwitcher;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getYesNoFieldset()
    {
        return $this->yesNoFieldset;
    }

    /**
     * @return YesNoInterface
     */
    public function getYesNoSwitcher()
    {
        return $this->yesNoSwitcher;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getCustomFieldset()
    {
        return $this->customFieldset;
    }

    /**
     * @return StateInterface
     */
    public function getState()
    {
        return $this->state;
    }
}