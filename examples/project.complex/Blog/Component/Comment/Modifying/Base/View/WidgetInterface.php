<?php

namespace Blog\Component\Comment\Modifying\Base\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @return FormLayoutInterface
     */
    public function getForm();

    /**
     * @return TextAreaInterface
     */
    public function getTextInput();

    /**
     * @return SubmitInterface
     */
    public function getSubmitButton();

    /**
     * @return DivInterface
     */
    public function getResultMessageContainer();
}