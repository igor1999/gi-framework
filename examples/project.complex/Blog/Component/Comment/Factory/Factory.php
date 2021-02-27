<?php

namespace Blog\Component\Comment\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Component\Comment\Body\Body as DetailBody;
use Blog\Component\Comment\Footer\Footer as DetailFooter;
use Blog\Component\Comment\Header\Header as DetailHeader;
use Blog\Component\Comment\Detail\Footerless\Footerless as FooterlessDetail;
use Blog\Component\Comment\Detail\Full\Full as FullDetail;
use Blog\Component\Comment\Feed\Feed;
use Blog\Component\Comment\Modifying\Creation\Creation;
use Blog\Component\Comment\Usecase\Creation\Creation as UsecaseCreation;
use Blog\Component\Comment\Usecase\Removing\Removing as UsecaseRemoving;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


use Blog\RDB\ORM\Comment\RecordInterface as CommentRecordInterface;
use Blog\RDB\ORM\Comment\SetInterface as CommentSetInterface;

use Blog\Component\Comment\Body\BodyInterface as DetailBodyInterface;
use Blog\Component\Comment\Footer\FooterInterface as DetailFooterInterface;
use Blog\Component\Comment\Header\HeaderInterface as DetailHeaderInterface;
use Blog\Component\Comment\Detail\Footerless\FooterlessInterface as FooterlessDetailInterface;
use Blog\Component\Comment\Detail\Full\FullInterface as FullDetailInterface;
use Blog\Component\Comment\Feed\FeedInterface;
use Blog\Component\Comment\Modifying\Creation\CreationInterface;
use Blog\Component\Comment\Usecase\Creation\CreationInterface as UsecaseCreationInterface;
use Blog\Component\Comment\Usecase\Removing\RemovingInterface as UsecaseRemovingInterface;

/**
 * Class Factory
 * @package Blog\Component\Comment\Factory
 *
 * @method DetailBodyInterface createDetailBody(CommentRecordInterface $comment)
 * @method DetailFooterInterface createDetailFooter(CommentRecordInterface $comment)
 * @method DetailHeaderInterface createDetailHeader(CommentRecordInterface $comment)
 * @method FooterlessDetailInterface createFooterlessDetail(CommentRecordInterface $comment)
 * @method FullDetailInterface createFullDetail(CommentRecordInterface $comment)
 * @method FeedInterface createFeed(CommentSetInterface $commentSet)
 * @method CreationInterface createCreation($postID)
 * @method UsecaseCreationInterface createUsecaseCreation($postID)
 * @method UsecaseRemovingInterface createUsecaseRemoving($id)
 */
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setNamed('DetailBody', DetailBody::class)
            ->setNamed('DetailFooter', DetailFooter::class)
            ->setNamed('DetailHeader', DetailHeader::class)
            ->setNamed('FooterlessDetail', FooterlessDetail::class)
            ->setNamed('FullDetail', FullDetail::class)
            ->set(Feed::class)
            ->set(Creation::class)
            ->setNamed('UsecaseCreation', UsecaseCreation::class)
            ->setNamed('UsecaseRemoving', UsecaseRemoving::class);
    }
}