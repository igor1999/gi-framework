<?php

namespace Chat\Identity;

use GI\Identity\ArrayIdentity\IdentityInterface as BaseInterface;

/**
 * Interface IdentityInterface
 * @package Chat\Identity
 *
 * @method getEmail()
 */
interface IdentityInterface extends BaseInterface
{
    /**
     * @return int
     * @throws \Exception
     */
    public function getID();

    /**
     * @return string
     * @throws \Exception
     */
    public function getLogin();

    /**
     * @return string
     * @throws \Exception
     */
    public function getSignature();
}