<?php

namespace Job\Identity;

use GI\Identity\IdentityInterface as BaseInterface;

/**
 * Interface IdentityInterface
 * @package Job\Identity
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