<?php

namespace Prime\Component\Prime\Model;

interface PrimeGenInterface
{
    /**
     * @return array
     */
    public function getPrimes();

    /**
     * @return int
     */
    public function getLength();

    /**
     * @param int $n
     * @return self
     * @throws \Exception
     */
    public function create(int $n);

    /**
     * @param int $min
     * @param int $max
     * @return array
     * @throws \Exception
     */
    public function slice(int $min, int $max);
}