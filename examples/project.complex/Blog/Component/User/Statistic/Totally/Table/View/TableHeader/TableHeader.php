<?php

namespace Blog\Component\User\Statistic\Totally\Table\View\TableHeader;

use GI\ClientContents\TableHeader\AbstractTableHeader as Base;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;
use Blog\Component\User\I18n\I18nAwareTrait;

class TableHeader extends Base implements TableHeaderInterface
{
    use ServiceLocatorAwareTrait, I18nAwareTrait;


    /**
     * TableHeader constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->addWithRowNumber('nr', $this->translate('number'))
            ->addWithDataAttributeAndOrderComplete('login', $this->translate('user'))
            ->addWithDataAttributeAndOrderComplete(
                'postsTotal', $this->translate('posts')
            )
            ->addWithDataAttributeAndOrderComplete(
                'commentsTotal', $this->translate('comments')
            )
            ->addWithDataAttributeAndOrderComplete(
                'receivedCommentsTotal', $this->translate('received comments')
            );
    }
}