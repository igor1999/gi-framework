<?php

namespace Chat\Socket\Conversation\Common;

use GI\SocketDemon\Exchange\Processor\AbstractProcessor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\SocketDemon\Exchange\Request\Common\CommonInterface as RequestInterface;

class Common extends AbstractProcessor implements CommonInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var RequestInterface
     */
    private $request;


    /**
     * @return self
     */
    protected function createRequest()
    {
        $this->request = $this->giGetSocketDemonFactory()->createCommonRequest();

        return $this;
    }

    /**
     * @return RequestInterface
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * @return self
     * @throws \Exception
     */
    public function process()
    {
        $this->getResponseCollection()->clean();

        try {
            $socketRecord = $this->chatGetRDBORMFactory()->createSocketRecord(
                [$this->getRequest()->getDemon(), $this->getRequest()->getId()]
            );

            if ($this->chatGetIdentity()->isAuthenticated()) {
                $result = $this->chatGetConversationResultFactory()->createMessage($this->getRequest()->getData());
                $this->getResponseCollection()->addBySiblings($socketRecord, $result);
            } else {
                $result = $this->chatGetConversationResultFactory()->createSocketSessionFailed();
                $this->getResponseCollection()->addBySocketRecord($socketRecord, $result);

                $result = $this->chatGetConversationResultFactory()->createLeave();
                $this->getResponseCollection()->addByOtherSiblings($socketRecord, $result);

                $socketRecord->delete();
            }
        } catch (\Exception $e) {
            $result = $this->chatGetConversationResultFactory()->createSocketDBFailed();
            $this->getResponseCollection()->addByRequestAndResult($this->getRequest(), $result);

            try {
                $demonRecord = $this->chatGetRDBORMFactory()->createDemonRecord($this->getRequest()->getDemon());

                $result = $this->chatGetConversationResultFactory()->createLeave();
                $this->getResponseCollection()->addByDemon($demonRecord, $result);
            } catch (\Exception $e) {}
        }

        return $this;
    }
}