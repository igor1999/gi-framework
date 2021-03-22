<?php

namespace Job\Identity;

use GI\Identity\ArrayIdentity\AbstractIdentity;
use Job\Identity\I18n\Glossary;

use Job\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Storage\Tree\TreeInterface;
use Job\Identity\I18n\GlossaryInterface;

/**
 * Class Identity
 * @package Chat\Identity
 *
 * @method getEmail()
 */
class Identity extends AbstractIdentity implements IdentityInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var TreeInterface
     */
    private static $sessionCache;


    /**
     * @return TreeInterface
     */
    protected function getSessionCache()
    {
        return self::$sessionCache;
    }

    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    protected function createByCredentials(string $login, string $password)
    {
        return $this->jobGetRDBDALFactory()->getUserDAL()->authenticate($login, $password);
    }

    /**
     * @param int $id
     * @return array
     */
    protected function createByUserID(int $id)
    {
        return [];
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getID()
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return '';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getLogin()
    {
        return $this->get('login');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSignature()
    {
        $template = '%s, %s';
        $grating  = $this->giTranslate(GlossaryInterface::class, Glossary::class,'Hello');

        return $this->isAuthenticated() ? sprintf($template, $grating, $this->getLogin()) : '';
    }
}