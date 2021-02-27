<?php

namespace Blog\Component\Post\Modifying\Base\View;

use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\Text\TextInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;

trait ContentsTrait
{
    /**
     * @var FormLayoutInterface
     */
    private $form;

    /**
     * @var TextInterface
     */
    private $titleInput;

    /**
     * @var TextAreaInterface
     */
    private $textInput;

    /**
     * @var SubmitInterface
     */
    private $submitButton;

    /**
     * @var DivInterface
     */
    private $resultMessageContainer;


    /**
     * @return FormLayoutInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return TextInterface
     */
    public function getTitleInput()
    {
        return $this->titleInput;
    }

    /**
     * @return TextAreaInterface
     */
    public function getTextInput()
    {
        return $this->textInput;
    }

    /**
     * @return SubmitInterface
     */
    public function getSubmitButton()
    {
        return $this->submitButton;
    }

    /**
     * @return DivInterface
     */
    public function getResultMessageContainer()
    {
        return $this->resultMessageContainer;
    }
}