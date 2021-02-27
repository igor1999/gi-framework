<?php

namespace Chat\Socket\Conversation\Expired;

use GI\SocketDemon\Exchange\Processor\AbstractProcessor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\SocketDemon\Exchange\Request\Expiration\ExpirationInterface as RequestInterface;

class Expired extends AbstractProcessor implements ExpiredInterface
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
        $this->request = $this->giGetSocketDemonFactory()->createExpirationRequest();

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
                $result = $this->chatGetConversationResultFactory()->createSocketExpired();
                $this->getResponseCollection()->addBySocketRecord($socketRecord, $result);

                $result = $this->chatGetConversationResultFactory()->createLeave();
                $this->getResponseCollection()->addByOtherSiblings($socketRecord, $result);
            } else {
                $result = $this->chatGetConversationResultFactory()->createSocketSessionFailed();
                $this->getResponseCollection()->addBySocketRecord($socketRecord, $result);

                $result = $this->chatGetConversationResultFactory()->createLeave();
                $this->getResponseCollection()->addByOtherSiblings($socketRecord, $result);
            }

            $socketRecord->delete();
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