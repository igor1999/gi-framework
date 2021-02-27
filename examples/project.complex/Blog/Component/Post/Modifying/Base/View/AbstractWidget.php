<?php

namespace Blog\Component\Post\Modifying\Base\View;

use GI\Component\Base\View\Widget\AbstractWidget as Base;

use Blog\Component\Post\I18n\I18nAwareTrait;
use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\ViewModel\Post\ViewModelInterface as PostViewModelInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\Input\Text\TextInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;

abstract class AbstractWidget extends Base implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-post-modifying-base';


    const SUCCESS_MESSAGE_DATA_KEY = 'success-message';


    /**
     * @return PostViewModelInterface
     */
    abstract protected function getViewModel();

    /**
     * @return static
     * @throws \Exception
     */
    protected function build()
    {
        $message = $this->translate('Information saved. Please wait...');
        $this->getServerDataList()->set(static::SUCCESS_MESSAGE_DATA_KEY, $message);

        return $this;
    }

    /**
     * @render
     * @gi-id form
     * @return FormLayoutInterface
     */
    protected function createForm()
    {
        $this->form = $this->giGetDOMFactory()->createFormLayout()->setMethodToPost();

        return $this->form;
    }

    /**
     * @gi-id title-input
     * @return TextInterface
     */
    protected function createTitleInput()
    {
        $this->titleInput = $this->giGetDOMFactory()->getInputFactory()->createText(
            $this->getViewModel()->getTitleName(), $this->getViewModel()->getTitle()
        );

        $this->titleInput->getAttributes()->setPlaceholder($this->translate('title'));

        return $this->titleInput;
    }

    /**
     * @gi-id text-input
     * @return TextAreaInterface
     */
    protected function createTextInput()
    {
        $this->textInput = $this->giGetDOMFactory()->createTextArea(
            $this->getViewModel()->getTextName(), $this->getViewModel()->getText()
        );

        $this->textInput->getAttributes()->setPlaceholder($this->translate('text'));

        return $this->textInput;
    }

    /**
     * @gi-id submit-button
     * @return SubmitInterface
     */
    protected function createSubmitButton()
    {
        $this->submitButton = $this->giGetDOMFactory()->getInputFactory()->createSubmit(
            [], $this->translate('save!')
        );

        return $this->submitButton;
    }

    /**
     * @gi-id result-message-container
     * @return DivInterface
     */
    protected function createResultMessageContainer()
    {
        $this->resultMessageContainer = $this->giGetDOMFactory()->createDiv();

        return $this->resultMessageContainer;
    }
}