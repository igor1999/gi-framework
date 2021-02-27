<?php

namespace Chat\Socket\Conversation\Result\Join;

use GI\SocketDemon\Exchange\Response\Result\Base\Author\AbstractAuthor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

class Join extends AbstractAuthor implements JoinInterface
{
    use ServiceLocatorAwareTrait;


    const TITLE = 'join';
}