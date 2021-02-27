<?php

namespace Blog\RDB\DAL\User;



interface DALInterface
{
    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function authenticate($login, $password);

    /**
     * @param string $prefix
     * @return array[]
     */
    public function autocompleteLogin($prefix);

    /**
     * @param string $order
     * @param bool $direction
     * @return array[]
     */
    public function getStatisticTotal($order = '', $direction = true);
}