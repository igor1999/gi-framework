<?php

namespace Blog\Component\Post\Factory;

use GI\Pattern\Factory\AbstractFactory as Base;

use Blog\Component\Post\Search\Search as Search;
use Blog\Component\Post\Body\Full\Body as DetailFullBody;
use Blog\Component\Post\Body\Short\Body as DetailShortBody;
use Blog\Component\Post\Footer\Footer as DetailFooter;
use Blog\Component\Post\Header\Header as DetailHeader;
use Blog\Component\Post\Detail\Footerless\Footerless as FooterlessDetail;
use Blog\Component\Post\Detail\Full\Full as FullDetail;
use Blog\Component\Post\Detail\Short\Short as ShortDetail;
use Blog\Component\Post\Detail\Usecase\Detail;
use Blog\Component\Post\Feed\Set\Set as FeedSet;
use Blog\Component\Post\Feed\Usecase\Usecase as FeedUsecase;
use Blog\Component\Post\Modifying\Creation\Creation;
use Blog\Component\Post\Modifying\Edition\Edition;


use Blog\ServiceLocator\ServiceLocatorAwareTrait;


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
 * Class Factory
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
class Factory extends Base implements FactoryInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * Factory constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setNamed('Search', Search::class)
            ->setNamed('DetailFullBody', DetailFullBody::class)
            ->setNamed('DetailShortBody', DetailShortBody::class)
            ->setNamed('DetailFooter', DetailFooter::class)
            ->setNamed('DetailHeader', DetailHeader::class)
            ->setNamed('FooterlessDetail', FooterlessDetail::class)
            ->setNamed('FullDetail', FullDetail::class)
            ->setNamed('ShortDetail', ShortDetail::class)
            ->setNamed('DetailUsecase', Detail::class)
            ->setNamed('FeedSet', FeedSet::class)
            ->setNamed('FeedUsecase', FeedUsecase::class)
            ->set(Creation::class)
            ->set(Edition::class);
    }
}