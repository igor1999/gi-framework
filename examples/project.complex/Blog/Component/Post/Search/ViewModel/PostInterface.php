<?php

namespace Blog\Component\Post\Search\ViewModel;

use Blog\ViewModel\Post\ViewModelInterface;
use GI\ViewModel\Filter\FilterAwareInterface;

/**
 * interface PostInterface
 * @package Blog\Component\Post\Search\ViewModel
 *
 * @method array getFromName()
 * @method string renderFromName()
 * @method array getTillName()
 * @method string renderTillName()
 */
interface PostInterface extends ViewModelInterface, FilterAwareInterface
{
    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getFromAsDate();

    /**
     * @return string
     */
    public function getTill();

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getTillAsDate();

    /**
     * @return UserInterface
     */
    public function getUser();

    /**
     * @return array
     * @throws \Exception
     */
    public function extractToDB();

    /**
     * @return array
     * @throws \Exception
     */
    public function extractToSession();

    /**
     * @param array $contents
     * @return self
     * @throws \Exception
     */
    public function hydrateFromSession(array $contents);
}