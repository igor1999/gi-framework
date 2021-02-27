<?php

namespace STA\Component\Switchers\State\Selection;

use GI\ClientContents\Selection\Single\AbstractImmutableSingle;
use STA\Component\Switchers\State\I18n\Glossary;

use STA\ServiceLocator\ServiceLocatorAwareTrait;

use GI\ClientContents\Selection\Item\ItemInterface;
use STA\Component\Switchers\State\I18n\GlossaryInterface;

class Selection extends AbstractImmutableSingle implements SelectionInterface
{
    use ServiceLocatorAwareTrait;


    const SAFE_VALUE    = '0';

    const SAFE_TEXT     = 'safe';

    const WARNING_VALUE = '1';

    const WARNING_TEXT  = 'warning';

    const DANGER_VALUE  = '2';

    const DANGER_TEXT   = 'danger';


    public function __construct()
    {
        $this->set(static::SAFE_VALUE, $this->translate(static::SAFE_TEXT))
            ->set(static::WARNING_VALUE, $this->translate(static::WARNING_TEXT))
            ->set(static::DANGER_VALUE, $this->translate(static::DANGER_TEXT));
    }

    /**
     * @param string $text
     * @return string
     */
    protected function translate($text)
    {
        return $this->giTranslate(GlossaryInterface::class, Glossary::class, $text);
    }

    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getSafe()
    {
        return $this->get(static::SAFE_VALUE);
    }

    /**
     * @return self
     * @throws \Exception
     */
    public function selectSafe()
    {
        $this->getSafe()->setSelected(true);

        return $this;
    }

    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getWarning()
    {
        return $this->get(static::WARNING_VALUE);
    }

    /**
     * @return self
     * @throws \Exception
     */
    public function selectWarning()
    {
        $this->getSafe()->setSelected(true);

        return $this;
    }

    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getDanger()
    {
        return $this->get(static::DANGER_VALUE);
    }

    /**
     * @return self
     * @throws \Exception
     */
    public function selectDanger()
    {
        $this->getSafe()->setSelected(true);

        return $this;
    }
}