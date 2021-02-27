<?php

namespace Blog\Module\Call\Web\Container\User;

use GI\Application\Module\CallContainer\Web\Web as Base;
use Blog\Module\Call\Web\Container\User\Statistic\Statistic as UserStatisticCallContainer;
use Blog\Module\Call\Web\BaseCall;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Module\Call\Web\BaseCallInterface;

use Blog\Component\User\LoginAutocomplete\Gate\Gate as LoginAutocompleteGate;

class User extends Base implements UserInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->add(new UserStatisticCallContainer());
    }

    /**
     * @extract
     * @return BaseCallInterface
     * @throws \Exception
     */
    protected function createAutocomplete()
    {
        return new BaseCall(
            $this->blogGetRouteTree()->getUserTree()->getAutocomplete(),
            function(BaseCallInterface $call)
            {
                (new LoginAutocompleteGate($call))->getList();

                return true;
            }
        );
    }
}