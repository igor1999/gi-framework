<?php

namespace Chat\RDB\DAL\User;

use Chat\ServiceLocator\ServiceLocatorIntegralTrait;

class DAL implements DALInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function authenticate(string $login, string $password)
    {
        $sql = '
            SELECT *
            FROM {{user}}
            WHERE {{login}} = :login
        ';

        try {
            $row = $this->chatGetRDBDriverFactory()->getMain()->fetch($sql, ['login' => $login]);

            $verified = $this->giGetPasswordVerifier()->verify($password, $row['password']);

            if (!$verified) {
                $row = [];
            }
        } catch (\Exception $e) {
            $row = [];
        }

        return $row;
    }
}