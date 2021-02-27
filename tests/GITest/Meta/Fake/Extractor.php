<?php

namespace GITest\Meta\Fake;

use GI\Pattern\ArrayExchange\ExtractionInterface;

class Extractor implements ExtractionInterface
{
    public function extract()
    {
        return [];
    }
}