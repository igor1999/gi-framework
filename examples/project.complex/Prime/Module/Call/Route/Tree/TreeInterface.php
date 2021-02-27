<?php

namespace Prime\Module\Call\Route\Tree;

use GI\REST\Route\Segmented\Tree\UriPath\TreeInterface as BaseInterface;

use GI\REST\Route\Segmented\UriPath\Advanced\Get\GetInterface as UriPathWithMethodGetInterface;

interface TreeInterface extends BaseInterface
{
    const TYPE_DROPDOWN = 'dropdown';

    const TYPE_COMMON   = 'common';

    const TYPE_DASH     = 'dash';

    const TYPE_SNAPSHOT = 'snapshot';

    const TYPE_WINGS    = 'wings';


    /**
     * @return UriPathWithMethodGetInterface
     * @throws \Exception
     */
    public function getPrime();

    /**
     * @return string
     * @throws \Exception
     */
    public function buildDropdown();

    /**
     * @return string
     * @throws \Exception
     */
    public function buildCommon();

    /**
     * @return string
     * @throws \Exception
     */
    public function buildDash();

    /**
     * @return string
     * @throws \Exception
     */
    public function buildSnapshot();

    /**
     * @return string
     * @throws \Exception
     */
    public function buildWings();
}