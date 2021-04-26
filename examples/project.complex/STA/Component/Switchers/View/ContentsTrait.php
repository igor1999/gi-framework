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
}