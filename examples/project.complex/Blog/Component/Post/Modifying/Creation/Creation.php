<?php

namespace Blog\Component\Post\Modifying\Creation;

use GI\Component\Base\AbstractComponent;
use Blog\Component\Post\Modifying\Creation\View\Widget;
use Blog\Component\Post\Modifying\Creation\ViewModel\ViewModel;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\Component\Post\Modifying\Creation\View\WidgetInterface;
use Blog\Component\Post\Modifying\Creation\ViewModel\ViewModelInterface;

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
     * Creation constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);

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
        return $this->getView()->setViewModel($this->getViewModel())->toString();
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
            $post = $this->blogGetRDBORMFactory()->createPostRecord();
            $post->hydrate($this->getViewModel()->extract());
            $post->setAuthorID($authentication->getID())->setCreateAtToNow();

            $post->insert();

            $url = $this->blogGetRouteTree()->getPostTree()->buildDetailWithId($post->getId());

            $response = ['success' => 1, 'redirectURI' => $url];
        }

        return $response;
    }
}