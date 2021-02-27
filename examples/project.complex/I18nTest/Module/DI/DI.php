<?php

namespace I18nTest\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use I18nTest\ServiceLocator\ServiceLocatorAwareTrait;

use GI\I18n\Locales\UserLocaleContextInterface;
use I18nTest\Module\DI\GI\I18n\Locales\UserLocaleContext;

class DI extends Base implements DIInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * DI constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->create(
            UserLocaleContextInterface::class, null, UserLocaleContext::class, true
        );
    }
}