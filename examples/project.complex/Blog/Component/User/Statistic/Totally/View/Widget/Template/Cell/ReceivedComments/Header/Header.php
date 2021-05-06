<?php

namespace Blog\Component\User\Statistic\Totally\View\Widget\Template\Cell\ReceivedComments\Header;

use GI\Component\Table\View\Widget\Template\Cell\Header\Ordered\AbstractOrdered;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\User\I18n\I18nAwareTrait;

class Header extends AbstractOrdered implements HeaderInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    /**
     * @return bool
     */
    protected function isOrderBothDirections()
    {
        return true;
    }

    /**
     * @return string
     */
    protected function getOrderCriteria()
    {
        return 'receivedCommentsTotal';
    }

    /**
     * @return string
     */
    protected function getCaption()
    {
        return $this->translate('received comments');
    }
}