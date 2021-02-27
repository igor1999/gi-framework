<?php

namespace Chat\Module\Call\Web\Container\Authentication;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Chat\Module\Call\Web\BaseCall;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use Chat\Module\Call\Web\BaseCallInterface;

use GI\Component\Authentication\Login\Dialog\Gate\Gate as LoginDialogGate;
use GI\Component\Authentication\Logout\Gate\Gate as LogoutGate;

class Authentication extends Base implements AuthenticationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createLogin()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getAuthenticationTree()->getLogin(),
            function(BaseCallInterface $call)
            {
                (new LoginDialogGate($call))->login();

                return true;
            }
        );
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createLogout()
    {
        return new BaseCall(
            $this->chatGetRouteTree()->getAuthenticationTree()->getLogout(),
            function(BaseCallInterface $call)
            {
                (new LogoutGate($call))->logout();

                return true;
            }
        );
    }
}