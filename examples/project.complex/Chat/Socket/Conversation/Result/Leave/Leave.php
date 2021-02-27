<?php

namespace Chat\Socket\Conversation\Result\Leave;

use GI\SocketDemon\Exchange\Response\Result\Base\Author\AbstractAuthor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Leave extends AbstractAuthor implements LeaveInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE = 'leave';
}