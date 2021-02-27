<?php

namespace Chat\Component\Conversation\I18n;

use GI\SocketDemon\Exchange\Response\I18n\Glossary as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

class Glossary extends Base implements GlossaryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Glossary constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->addByClass(self::class);
    }
}