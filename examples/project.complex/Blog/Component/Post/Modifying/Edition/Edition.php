<?php

namespace Blog\Component\Post\Modifying\Edition;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Modifying\Edition\View\Widget;
use Blog\Component\Post\Modifying\Edition\ViewModel\ViewModel;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Modifying\Edition\View\WidgetInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\Component\Post\Modifying\Edition\ViewModel\ViewModelInterface;

class Edition extends AbstractComponent implements EditionInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var WidgetInterface
     */
    private $view;

    /**
     * @var PostRecordInterface
     */
    private $post;

    /**
     * @var ViewModelInterface
     */
    private $viewModel;


    /**
     * Editing constructor.
     * @param int $id
     * @throws \Exception
     */
    public function __construct($id)
    {
        if (empty($id)) {
            $this->giThrowIsEmptyException('Post ID');
        }

        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

        $this->post = $this->blogGetRDBORMFactory()->createPostRecord($id);

        $this->viewModel = $this->giGetDi(ViewModelInterface::class, ViewModel::class);
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return PostRecordInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return ViewModelInterface
     */
    protected function getViewModel()
    {
        return $this->viewModel;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $this->getViewModel()->hydrate($this->getPost()->extract());

        return $this->getView()->setId($this->getPost()->getId())->setViewModel($this->getViewModel())->toString();
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function save(array $data)
    {
        $authentication = $this->blogGetIdentity();

        $authentication->validateEditPost($this->getPost());

        $this->getViewModel()->hydrate($data);

        if (!$this->getViewModel()->validate()) {
            $response = ['success' => 0, 'messages' => $this->getViewModel()->getValidator()->getMessagesFlat()];
        } else {
            $this->getPost()->hydrate($this->getViewModel()->extract());

            $this->getPost()->update();

            $route = $this->blogGetRouteTree()->getPostTree()->buildDetailWithId($this->getPost()->getId());

            $response = ['success' => 1, 'redirectURI' => $route];
        }

        return $response;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function delete()
    {
        $this->blogGetIdentity()->validateDeletePost($this->getPost());

        $this->getPost()->delete();

        $this->blogGetLoggingFactory()->getDBActionsFactory()->getPostRemoving()->log($this->getPost());

        return $this->blogGetRouteTree()->getPostTree()->getFeed()->build();
    }
}