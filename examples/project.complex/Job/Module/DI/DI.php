<?php

namespace Job\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Component\Authentication\Login\Dialog\Context\ContextInterface as GILoginDialogContextInterface;
use Job\Module\DI\GI\Component\Authentication\Login\Dialog\Context as ChatLoginDialogContext;

use GI\Component\Authentication\Logout\Context\ContextInterface as GILogoutContextInterface;
use Job\Module\DI\GI\Component\Authentication\Logout\Context as ChatLogoutContext;

use GI\Identity\IdentityInterface;
use Job\Identity\Identity;

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
            GILoginDialogContextInterface::class, null, ChatLoginDialogContext::class, true
            )
            ->create(GILogoutContextInterface::class, null, ChatLogoutContext::class, true)
            ->create(IdentityInterface::class, null, Identity::class, true);
    }
}