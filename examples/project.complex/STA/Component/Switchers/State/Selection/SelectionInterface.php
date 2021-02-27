<?php

namespace STA\Component\Switchers\State\Selection;

use GI\ClientContents\Selection\Single\ImmutableSingleInterface;
use GI\ClientContents\Selection\Item\ItemInterface;

interface SelectionInterface extends ImmutableSingleInterface
{
    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getSafe();

    /**
     * @return self
     * @throws \Exception
     */
    public function selectSafe();

    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getWarning();

    /**
     * @return self
     * @throws \Exception
     */
    public function selectWarning();

    /**
     * @return ItemInterface
     * @throws \Exception
     */
    public function getDanger();

    /**
     * @return self
     * @throws \Exception
     */
    public function selectDanger();
}