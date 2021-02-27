<?php

namespace Chat\Component\Base\View;

trait ChatJSTrait
{
    /**
     * @return static
     * @throws \Exception
     */
    protected function addChatJS()
    {
        $target = $this->giCreateClassDirChildFile(ChatJSTrait::class, 'web/js/chat.js');
        $url    = 'Chat/Component/Base/js/chat.js';

        $this->addJS($target, $url);

        return $this;
    }
}