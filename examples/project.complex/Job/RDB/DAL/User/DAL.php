<?php

namespace Job\RDB\DAL\User;

use Job\ServiceLocator\ServiceLocatorIntegralTrait;

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
            $row = $this->jobGetRDBDriverFactory()->getMain()->fetch($sql, ['login' => $login]);

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