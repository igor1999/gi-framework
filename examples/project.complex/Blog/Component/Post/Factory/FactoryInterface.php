<?php

namespace Blog\Component\Post\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use Blog\Component\Post\Search\ViewModel\PostInterface as ViewModelInterface;
use Blog\RDB\ORM\Post\RecordInterface as PostRecordInterface;
use Blog\RDB\ORM\Post\SetInterface as PostSetInterface;

use Blog\Component\Post\Search\SearchInterface as SearchInterface;
use Blog\Component\Post\Body\Full\BodyInterface as DetailFullBodyInterface;
use Blog\Component\Post\Body\Short\BodyInterface as DetailShortBodyInterface;
use Blog\Component\Post\Footer\FooterInterface as DetailFooterInterface;
use Blog\Component\Post\Header\HeaderInterface as DetailHeaderInterface;
use Blog\Component\Post\Detail\Footerless\FooterlessInterface as FooterlessDetailInterface;
use Blog\Component\Post\Detail\Full\FullInterface as FullDetailInterface;
use Blog\Component\Post\Detail\Short\ShortInterface as ShortDetailInterface;
use Blog\Component\Post\Detail\Usecase\DetailInterface;
use Blog\Component\Post\Feed\Set\SetInterface as FeedSetInterface;
use Blog\Component\Post\Feed\Usecase\UsecaseInterface as FeedUsecaseInterface;
use Blog\Component\Post\Modifying\Creation\CreationInterface;
use Blog\Component\Post\Modifying\Edition\EditionInterface;

/**
 * Interface FactoryInterface
 * @package Blog\Component\Post\Factory
 *
 * @method SearchInterface createSearch(ViewModelInterface $viewModel)
 * @method DetailFullBodyInterface createDetailFullBody(PostRecordInterface $post)
 * @method DetailShortBodyInterface createDetailShortBody(PostRecordInterface $post)
 * @method DetailFooterInterface createDetailFooter(PostRecordInterface $post)
 * @method DetailHeaderInterface createDetailHeader(PostRecordInterface $post)
 * @method FooterlessDetailInterface createFooterlessDetail(PostRecordInterface $post)
 * @method FullDetailInterface createFullDetail(PostRecordInterface $post)
 * @method ShortDetailInterface createShortDetail(PostRecordInterface $post)
 * @method DetailInterface createDetailUsecase($id)
 * @method FeedSetInterface createFeedSet(PostSetInterface $postSet)
 * @method FeedUsecaseInterface createFeedUsecase(array $conditions = [])
 * @method CreationInterface createCreation()
 * @method EditionInterface createEdition($id)
 */
interface FactoryInterface extends BaseInterface
{

}