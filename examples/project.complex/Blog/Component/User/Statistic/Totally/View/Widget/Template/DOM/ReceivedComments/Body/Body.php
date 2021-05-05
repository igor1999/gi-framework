<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget\Template\DOM\ReceivedComments\Body;

use GI\DOM\HTML\Element\Table\Cell\TD\TD;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\RDB\ORM\User\RecordInterface;

class Body extends TD implements BodyInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Body constructor.
     * @param RecordInterface $record
     * @throws \Exception
     */
    public function __construct(RecordInterface $record)
    {
        parent::__construct($record->getReceivedCommentsTotal());
    }
}