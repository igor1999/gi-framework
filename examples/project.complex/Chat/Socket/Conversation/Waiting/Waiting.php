<?php

namespace Chat\Socket\Conversation\Waiting;

use GI\SocketDemon\Exchange\Processor\AbstractProcessor;

use Chat\ServiceLocator\ServiceLocatorAwareTrait;

use GI\SocketDemon\Exchange\Request\Waiting\WaitingInterface as RequestInterface;

class Waiting extends AbstractProcessor implements WaitingInterface
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
        $this->request = $this->giGetSocketDemonFactory()->createWaitingRequest();

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

        if (!$this->chatGetIdentity()->isAuthenticated()) {
            $result = $this->chatGetConversationResultFactory()->createAuthReject();
            $this->getResponseCollection()->addByRequestAndResult($this->getRequest(), $result);
        } else {
            $socketRecord = $this->chatGetRDBORMFactory()->createSocketRecord();
            $socketRecord->setDemonName($this->getRequest()->getDemon())
                ->setSocketId($this->getRequest()->getId())
                ->setUserId($this->chatGetIdentity()->getID());

            try {
                $socketRecord->insert();

                $result = $this->chatGetConversationResultFactory()->createSocketAlreadyExists();
                $this->getResponseCollection()->addByRequestAndResult($this->getRequest(), $result);
            } catch (\Exception $exception) {
                $result = $this->chatGetConversationResultFactory()->createAuthConfirm();
                $this->getResponseCollection()->addBySocketRecord($socketRecord, $result);

                $resultForOthers = $this->chatGetConversationResultFactory()->createJoin();
                $this->getResponseCollection()->addByOtherSiblings($socketRecord, $resultForOthers);
            }
        }

        return $this;
    }
}