<?php

namespace Blog\Component\Post\Search\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;
use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\DateTime\DateInputInterface;
use GI\DOM\HTML\Element\Input\InputInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\TextContainer\Span\SpanInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel);

    /**
     * @return FormLayoutInterface
     */
    public function getForm();

    /**
     * @return LoginAutocompleteInterface
     */
    public function getAuthorInput();

    /**
     * @return FieldsetLayoutInterface
     */
    public function getDatesFieldset();

    /**
     * @return DateInputInterface
     */
    public function getDateFrom();

    /**
     * @return SpanInterface
     */
    public function getDatesSeparator();

    /**
     * @return DateInputInterface
     */
    public function getDateTill();

    /**
     * @return InputInterface
     */
    public function getTitleInput();

    /**
     * @return TextAreaInterface
     */
    public function getTextInput();

    /**
     * @return SubmitInterface
     */
    public function getSubmitButton();
}