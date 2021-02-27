<?php

namespace Prime\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\AbstractTree;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

class Tree extends AbstractTree implements TreeInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @return string
     */
    protected function getTemplate()
    {
        return '/prime';
    }

    /**
     * @return array
     */
    protected function getTypes()
    {
        return [
            self::TYPE_DROPDOWN,
            self::TYPE_COMMON,
            self::TYPE_DASH,
            self::TYPE_SNAPSHOT,
            self::TYPE_WINGS,
        ];
    }

    /**
     * @param string $type
     * @return bool
     */
    protected function validateType(string $type)
    {
        return in_array($type, $this->getTypes());
    }

    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getPrime()
    {
        $f = function($type)
        {
            return $this->validateType($type);
        };

        $route = $this->createUriPathWithMethodGet('/:type');
        $route->setConstraint('type', $f);

        return $route;
    }

    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    protected function buildPrime(string $type)
    {
        if (!$this->validateType($type)) {
            $this->giThrowNotFoundException('Paging type', $type);
        }

        return $this->getPrime()->build(['type' => $type]);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildDropdown()
    {
        return $this->buildPrime(self::TYPE_DROPDOWN);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildCommon()
    {
        return $this->buildPrime(self::TYPE_COMMON);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildDash()
    {
        return $this->buildPrime(self::TYPE_DASH);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildSnapshot()
    {
        return $this->buildPrime(self::TYPE_SNAPSHOT);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function buildWings()
    {
        return $this->buildPrime(self::TYPE_WINGS);
    }
}