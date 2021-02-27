<?php

namespace Chat\Module\DI;

use Core\Module\DI\AbstractDI as Base;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Component\Authentication\Login\Dialog\Context\ContextInterface as GILoginDialogContextInterface;
use Chat\Module\DI\GI\Component\Authentication\Login\Dialog\Context as ChatLoginDialogContext;

use GI\Component\Authentication\Logout\Context\ContextInterface as GILogoutContextInterface;
use Chat\Module\DI\GI\Component\Authentication\Logout\Context as ChatLogoutContext;

use GI\Identity\IdentityInterface;
use Chat\Identity\Identity;

use GI\SocketDemon\Demon\Context\ContextInterface as DemonContextInterface;
use Chat\Module\DI\GI\SocketDemon\Demon\Context\Context as DemonContext;

use GI\SocketDemon\Exchange\Request\Context\ContextInterface as RequestContextInterface;
use Chat\Module\DI\GI\SocketDemon\Exchange\Request\Context\Context as RequestContext;

use GI\SocketDemon\Socket\Client\Collection\Context\ContextInterface as SocketCollectionContextInterface;
use Chat\Module\DI\GI\SocketDemon\Socket\Client\Collection\Context\Context as SocketCollectionContext;

use GI\SocketDemon\Socket\Client\Item\Context\ContextInterface as SocketItemContextInterface;
use Chat\Module\DI\GI\SocketDemon\Socket\Client\Item\Context\Context as SocketItemContext;

use GI\SocketDemon\Socket\Server\Context\ContextInterface as SocketServerContextInterface;
use Chat\Module\DI\GI\SocketDemon\Socket\Server\Context\Context as SocketServerContext;

use GI\FileSystem\FSO\FSOFile\Collection\HashSet\HashSetInterface as FSOFileHashSetInterface;
use GI\Logger\Logger;
use Chat\Logging\FSO\Map as LoggingFSOMap;

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
            ->create(IdentityInterface::class, null, Identity::class, true)
            ->create(DemonContextInterface::class, null, DemonContext::class, true)
            ->create(RequestContextInterface::class, null, RequestContext::class, true)
            ->create(
                SocketCollectionContextInterface::class,
                null,
                SocketCollectionContext::class,
                true
            )
            ->create(SocketItemContextInterface::class, null, SocketItemContext::class, true)
            ->create(
                SocketServerContextInterface::class, null, SocketServerContext::class, true
            )->create(
                FSOFileHashSetInterface::class,Logger::class,LoggingFSOMap::class,true
            );
    }
}