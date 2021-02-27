<?php

namespace Prime\Component\Prime\Model;

use Prime\ServiceLocator\ServiceLocatorIntegralTrait;

class PrimeGen implements PrimeGenInterface
{
    use ServiceLocatorIntegralTrait;


    const START_NUMBERS = [2, 3, 5, 7];

    const ODDS          = [1, 3, 7, 9];


    /**
     * @var array
     */
    private $primes = [];


    /**
     * @return array
     */
    public function getPrimes()
    {
        return $this->primes;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return count($this->primes);
    }

    /**
     * @param int $n
     * @return self
     * @throws \Exception
     */
    public function create(int $n)
    {
        if ($n <= 0) {
            $this->giThrowInvalidMinimumException('Number of primes', $n, 1);
        }

        if ($n <= count(static::START_NUMBERS)) {
            $this->primes = array_slice(static::START_NUMBERS, 0, $n);
        } else {
            $this->primes = static::START_NUMBERS;

            $decCounter  = 10;
            $oddsCounter = 0;

            while(count($this->primes) < $n) {
                $p = $decCounter + static::ODDS[$oddsCounter];

                if ($this->isPrime($p)) {
                    $this->primes[] = $p;
                }

                $oddsCounter += 1;
                if (!array_key_exists($oddsCounter, static::ODDS)) {
                    $decCounter += 10;
                    $oddsCounter = 0;
                }
            }
        }

        return $this;
    }

    /**
     * @param int $p
     * @return bool
     */
    protected function isPrime(int $p)
    {
        $result = true;
        $max    = pow($p, 0.5);

        foreach ($this->primes as $prime) {
            if ($prime > $max) {
                break;
            }

            if (($p % $prime) == 0) {
                $result = false;
                break;
            }
        }

        return $result;
    }

    /**
     * @param int $min
     * @param int $max
     * @return array
     * @throws \Exception
     */
    public function slice(int $min, int $max)
    {
        if ($min < 1) {
            $this->giThrowInvalidMinimumException('Min position', $min, 1);
        }

        if ($max > $this->getLength()) {
            $this->giThrowInvalidMaximumException('Max position', $max, $this->getLength());
        }

        if ($min > $max) {
            $this->giThrowInvalidMaximumException('Min position', $min, $max);
        }

        return array_slice($this->primes, $min - 1, ($max - $min + 1), true);
    }
}