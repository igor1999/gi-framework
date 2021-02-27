<?php

namespace Blog\Component\Post\Modifying\Edition;

use GI\Component\Base\ComponentInterface;
use Blog\Component\Post\Modifying\Edition\View\WidgetInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;

interface EditionInterface extends ComponentInterface
{
    /**
     * @return WidgetInterface
     */
    public function getView();

    /**
     * @return PostRecordInterface
     */
    public function getPost();

    /**
     * @return string
     * @throws \Exception
     */
    public function toString();

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function save(array $data);

    /**
     * @return string
     * @throws \Exception
     */
    public function delete();
}