<?php

namespace Blog\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Component\Authentication\Login\Dialog\Context\ContextInterface as GILoginDialogContextInterface;
use Blog\Module\DI\GI\Component\Authentication\Login\Dialog\Context as BlogLoginDialogContext;

use GI\Component\Authentication\Logout\Context\ContextInterface as GILogoutContextInterface;
use Blog\Module\DI\GI\Component\Authentication\Logout\Context as BlogLogoutContext;

use GI\Component\Captcha\ImageText\Context\ContextInterface as GICaptchaImageTextContextInterface;
use Blog\Module\DI\GI\Component\Captcha\ImageText\Context as BlogCaptchaImageTextContext;

use GI\Identity\IdentityInterface;
use Blog\Identity\Identity;

use GI\Component\Autocomplete\View\ResourceRendererInterface as AutocompleteResourceRendererInterface;
use Blog\Component\User\LoginAutocomplete\View\Widget as LoginAutocompleteWidget;
use Blog\Component\User\LoginAutocomplete\View\ResourceRenderer as LoginAutocompleteResourceRenderer;

use GI\Component\Autocomplete\View\WidgetInterface as AutocompleteWidgetInterface;
use Blog\Component\User\LoginAutocomplete\LoginAutocomplete as LoginAutocomplete;

use GI\Component\Autocomplete\AutocompleteInterface as AutocompleteInterface;
use Blog\Component\User\LoginAutocomplete\Gate\Gate as LoginAutocompleteGate;

use GI\FileSystem\FSO\FSOFile\Collection\HashSet\HashSetInterface as FSOFileHashSetInterface;
use GI\Logger\Logger;
use Blog\Logging\FSO\Map as LoggingFSOMap;

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
            GILoginDialogContextInterface::class, null, BlogLoginDialogContext::class, true
            )
            ->create(GILogoutContextInterface::class, null, BlogLogoutContext::class, true)
            ->create(
                GICaptchaImageTextContextInterface::class,
                null,
                BlogCaptchaImageTextContext::class,
                true
            )
            ->create(IdentityInterface::class, null, Identity::class, true)
            ->create(
                AutocompleteResourceRendererInterface::class,
                LoginAutocompleteWidget::class,
                LoginAutocompleteResourceRenderer::class,
                true
            )->create(
                AutocompleteWidgetInterface::class,
                LoginAutocomplete::class,
                LoginAutocompleteWidget::class
            )->create(
                AutocompleteInterface::class,
                LoginAutocompleteGate::class,
                LoginAutocomplete::class
            )->create(
                FSOFileHashSetInterface::class,Logger::class,LoggingFSOMap::class,true
            );
    }
}