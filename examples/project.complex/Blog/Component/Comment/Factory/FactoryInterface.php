<?php

namespace Blog\Component\Comment\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

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
 * Interface FactoryInterface
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
interface FactoryInterface extends BaseInterface
{

}