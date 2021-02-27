<?php

namespace Core\Module;

use GI\Application\Module\Locator\AbstractLocator as Base;

use Home\Module\Provider as HomeProvider;
use I18nTest\Module\Provider as I18nTestProvider;
use Prime\Module\Provider as PrimeProvider;
use Blog\Module\Provider as BlogProvider;
use STA\Module\Provider as STAProvider;
use Chat\Module\Provider as ChatProvider;
use Job\Module\Provider as JobProvider;

class Locator extends Base implements LocatorInterface
{
    /**
     * Locator constructor.
     */
    public function __construct()
    {
        $this->add(new HomeProvider())
            ->add(new PrimeProvider())
            ->add(new I18nTestProvider())
            ->add(new BlogProvider())
            ->add(new STAProvider())
            ->add(new ChatProvider())
            ->add(new JobProvider());
    }
}