<?php

namespace Blog\Component\Comment\Modifying\Creation;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Comment\Modifying\Creation\View\Widget;
use Blog\Component\Comment\Modifying\Creation\ViewModel\ViewModel;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Comment\Modifying\Creation\View\WidgetInterface;
use Blog\Component\Comment\Modifying\Creation\ViewModel\ViewModelInterface;
use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;

class Creation extends AbstractComponent implements CreationInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;

    /**
     * @var ViewModelInterface
     */
    private $viewModel;

    /**
     * @var int
     */
    private $postID;


    /**
     * Creation constructor.
     * @param int $postID
     * @throws \Exception
     */
    public function __construct($postID)
    {
        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->viewModel = $this->giGetDi(ViewModelInterface::class, ViewModel::class);

        $this->postID = $postID;
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return ViewModelInterface
     */
    protected function getViewModel()
    {
        return $this->viewModel;
    }

    /**
     * @return int
     */
    protected function getPostID()
    {
        return $this->postID;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setViewModel($this->getViewModel())->setPostID($this->getPostID())->toString();
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function save(array $data)
    {
        $authentication = $this->blogGetIdentity();

        $this->getViewModel()->hydrate($data);

        if (!$this->getViewModel()->validate()) {
            $response = ['success' => 0, 'messages' => $this->getViewModel()->getValidator()->getMessagesFlat()];
        } else {
            $this->blogGetRDBORMFactory()->createPostRecord($this->getPostID());

            $comment = $this->blogGetRDBORMFactory()->createCommentRecord();
            $comment->hydrate($this->getViewModel()->extract());
            $comment->setAuthorID($authentication->getID())->setPostID($this->getPostID())->setCreateAtToNow();

            $comment->insert();

            $this->sendEmail($comment);

            $url = $this->blogGetRouteTree()->getPostTree()->buildDetailWithId($this->getPostID());

            $response = ['success' => 1, 'redirectURI' => $url];
        }

        return $response;
    }

    /**
     * @param CommentRecordInterface $comment
     * @return self
     */
    protected function sendEmail(CommentRecordInterface $comment)
    {
        try {
            $this->blogGetEmailFactory()->createNewComment($comment)->send();
        } catch (\Exception $e) {}

        return $this;
    }
}