<?php

namespace Blog\Component\Post\Search\View;

use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;
use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;
use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\DateTime\DateInputInterface;
use GI\DOM\HTML\Element\Input\InputInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\TextContainer\Span\SpanInterface;

trait ContentsTrait
{
    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var FormLayoutInterface
     */
    private $form;

    /**
     * @var LoginAutocompleteInterface
     */
    private $authorInput;

    /**
     * @var FieldsetLayoutInterface
     */
    private $datesFieldset;

    /**
     * @var DateInputInterface
     */
    private $dateFrom;

    /**
     * @var SpanInterface
     */
    private $datesSeparator;

    /**
     * @var DateInputInterface
     */
    private $dateTill;

    /**
     * @var InputInterface
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
     * @return ViewModelInterface
     */
    protected function getViewModel()
    {
        return $this->viewModel;
    }

    /**
     * @param ViewModelInterface $viewModel
     * @return self
     */
    public function setViewModel(ViewModelInterface $viewModel)
    {
        $this->viewModel = $viewModel;

        return $this;
    }

    /**
     * @return FormLayoutInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return LoginAutocompleteInterface
     */
    public function getAuthorInput()
    {
        return $this->authorInput;
    }

    /**
     * @return FieldsetLayoutInterface
     */
    public function getDatesFieldset()
    {
        return $this->datesFieldset;
    }

    /**
     * @return DateInputInterface
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @return SpanInterface
     */
    public function getDatesSeparator()
    {
        return $this->datesSeparator;
    }

    /**
     * @return DateInputInterface
     */
    public function getDateTill()
    {
        return $this->dateTill;
    }

    /**
     * @return InputInterface
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
}