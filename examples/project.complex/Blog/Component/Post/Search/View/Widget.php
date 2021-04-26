<?php

namespace Blog\Component\Post\Search\View;

use GI\Component\Base\View\Widget\AbstractWidget;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\Post\I18n\I18nAwareTrait;

use GI\DOM\HTML\Element\Form\Layouts\Fieldset\FieldsetInterface as FieldsetLayoutInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use Blog\Component\User\LoginAutocomplete\LoginAutocompleteInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;
use GI\DOM\HTML\Element\Input\DateTime\DateInputInterface;
use GI\DOM\HTML\Element\Input\Text\TextInterface;
use GI\DOM\HTML\Element\TextArea\TextAreaInterface;
use GI\DOM\HTML\Element\TextContainer\Span\SpanInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait, ContentsTrait, I18nAwareTrait;


    const CLIENT_CSS = 'blog-post-search';


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
     * @return self
     * @throws \Exception
     */
    protected function build()
    {
        $this->datesFieldset->build(1, 3)
            ->set(0, 0, $this->dateFrom)
            ->set(0, 1, $this->datesSeparator)
            ->set(0, 2, $this->dateTill);

        $this->form->build(5, 1)
            ->set(0, 0, $this->authorInput)
            ->set(1, 0, $this->datesFieldset)
            ->set(2, 0, $this->titleInput)
            ->set(3, 0, $this->textInput)
            ->set(4, 0, $this->submitButton)
        ;

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
            $this->form = $this->giGetDOMFactory()->createFormLayout();
        }

        return $this->form;
    }

    /**
     * @create
     * @return LoginAutocompleteInterface
     */
    protected function getAuthorInput()
    {
        if (!($this->authorInput instanceof LoginAutocompleteInterface)) {
            $this->authorInput = $this->blogGetComponentFactory()->createLoginAutocomplete(
                $this->getViewModel()->getUser()->getLoginName(),
                $this->getViewModel()->getUser()->getLogin()
            );
        }

        return $this->authorInput;
    }

    /**
     * @gi-id dates-fieldset
     * @return FieldsetLayoutInterface
     */
    protected function getDatesFieldset()
    {
        if (!($this->datesFieldset instanceof FieldsetLayoutInterface)) {
            $this->datesFieldset = $this->giGetDOMFactory()->createFieldsetLayout($this->translate('create at'));
        }

        return $this->datesFieldset;
    }

    /**
     * @gi-id date-from
     * @return DateInputInterface
     */
    protected function getDateFrom()
    {
        if (!($this->dateFrom instanceof DateInputInterface)) {
            $this->dateFrom = $this->giGetDOMFactory()->getInputFactory()->createDateInput(
                $this->getViewModel()->getFromName(), $this->getViewModel()->getFrom()
            );
        }

        return $this->dateFrom;
    }

    /**
     * @gi-id dates-separator
     * @return SpanInterface
     */
    protected function getDatesSeparator()
    {
        if (!($this->datesSeparator instanceof SpanInterface)) {
            $this->datesSeparator = $this->giGetDOMFactory()->createSpan($this->translate('till'));
        }

        return $this->datesSeparator;
    }

    /**
     * @gi-id date-till
     * @return DateInputInterface
     */
    protected function getDateTill()
    {
        if (!($this->dateTill instanceof DateInputInterface)) {
            $this->dateTill = $this->giGetDOMFactory()->getInputFactory()->createDateInput(
                $this->getViewModel()->getTillName(), $this->getViewModel()->getTill()
            );
        }

        return $this->dateTill;
    }

    /**
     * @gi-id title-input
     * @return TextInterface
     */
    protected function getTitleInput()
    {
        if (!($this->titleInput instanceof TextInterface)) {
            $this->titleInput = $this->giGetDOMFactory()->getInputFactory()->createText(
                $this->getViewModel()->getTitleName(), $this->getViewModel()->getTitle()
            );

            $this->titleInput->getAttributes()->setPlaceholder($this->translate('title'));
        }

        return $this->titleInput;
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
                [], $this->translate('search!')
            );
        }

        return $this->submitButton;
    }
}