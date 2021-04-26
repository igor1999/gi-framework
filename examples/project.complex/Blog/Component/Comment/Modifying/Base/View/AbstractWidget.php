<?php

namespace Blog\Component\Comment\Modifying\Base\View;

use GI\Component\Base\View\Widget\AbstractWidget as Base;

use Blog\Component\Comment\I18n\I18nAwareTrait;
use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\ViewModel\Comment\ViewModelInterface as CommentViewModelInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;

abstract class AbstractWidget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-comment-modifying-base';


    const SERVER_DATA_SUCCESS_MESSAGE = 'success-message';


    /**
     * @var FormLayoutInterface
     */
    private $form;

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
     * @return CommentViewModelInterface
     */
    abstract protected function getViewModel();

    /**
     * @return static
     * @throws \Exception
     */
    protected function build()
    {
        $message = $this->translate('Information saved. Please wait...');
        $this->getServerDataList()->set(static::SERVER_DATA_SUCCESS_MESSAGE, $message);

        return $this;
    }

    /**
     * @render
     * @gi-id form
     * @return FormLayoutInterface
     */
    protected function getForm()
    {
        if (!($this->form instanceof FormLayoutInterface)) {
            $this->form = $this->giGetDOMFactory()->createFormLayout()->setMethodToPost();
        }

        return $this->form;
    }

    /**
     * @gi-id text-input
     * @return TextAreaInterface
     */
    protected function getTextInput()
    {
        if (!($this->textInput instanceof TextAreaInterface)) {
            $this->textInput = $this->giGetDOMFactory()->createTextArea(
                $this->getViewModel()->getTextName(), $this->getViewModel()->getText()
            );

            $this->textInput->getAttributes()->setPlaceholder($this->translate('text'));
        }

        return $this->textInput;
    }

    /**
     * @gi-id submit-button
     * @return SubmitInterface
     */
    protected function getSubmitButton()
    {
        if (!($this->submitButton instanceof SubmitInterface)) {
            $this->submitButton = $this->giGetDOMFactory()->getInputFactory()->createSubmit(
                [], $this->translate('save!')
            );
        }

        return $this->submitButton;
    }

    /**
     * @gi-id result-message-container
     * @return DivInterface
     */
    protected function getResultMessageContainer()
    {
        if (!($this->resultMessageContainer instanceof DivInterface)) {
            $this->resultMessageContainer = $this->giGetDOMFactory()->createDiv();
        }

        return $this->resultMessageContainer;
    }
}