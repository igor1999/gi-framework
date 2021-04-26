<?php

namespace Prime\Component\Prime\View\Widget;

use GI\Component\Base\View\Widget\AbstractWidget;
use Prime\Component\Prime\I18n\Glossary;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use GI\DOM\HTML\Element\Table\TableInterface;
use Prime\Component\Prime\I18n\GlossaryInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ServiceLocatorAwareTrait;


    const CLIENT_CSS = 'prime-prime-widget';


    const GI_ID_FOR_TABLE = 'table';


    /**
     * @var array
     */
    private $numbers = [];

    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var TableInterface
     */
    private $table;


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
     * @return array
     */
    protected function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * @param array $numbers
     * @return self
     */
    public function setNumbers(array $numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @render
     * @gi-id table
     * @return TableInterface
     * @throws \Exception
     */
    protected function getTable()
    {
        if (!($this->table instanceof TableInterface)) {
            $this->table = $this->giGetDOMFactory()->createTable();

            $this->table->build(count($this->numbers), 2, true);

            $positionTitle = $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Position');
            $numberTitle   = $this->giTranslate(GlossaryInterface::class, Glossary::class, 'Number');
            $this->table
                ->set(0,0, $positionTitle)
                ->set(0,1, $numberTitle);

            $rowIndex = 1;
            foreach ($this->numbers as $index => $number) {
                $this->table
                    ->set($rowIndex, 0, $index + 1)
                    ->set($rowIndex, 1, $number);

                $rowIndex += 1;
            }
        }

        return $this->table;
    }

    /**
     * @return static
     */
    protected function build()
    {
        return $this;
    }
}