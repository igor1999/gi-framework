<?php

namespace Chat\RDB\DAL\User;

interface DALInterface
{
    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function authenticate(string $login, string $password);
}