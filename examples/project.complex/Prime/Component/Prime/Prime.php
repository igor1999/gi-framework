<?php

namespace Prime\Component\Prime;

use GI\Component\Base\AbstractComponent;
use Prime\Component\Prime\Context\Context;
use Prime\Component\Prime\View\View;
use Prime\Component\Prime\Model\PrimeGen;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Prime\Context\ContextInterface;
use GI\Component\Paging\Base\PagingInterface;
use Prime\Component\Prime\View\ViewInterface;
use Prime\Module\Call\Route\Tree\TreeInterface;
use Prime\Component\Prime\Model\PrimeGenInterface;

class Prime extends AbstractComponent implements PrimeInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var PagingInterface
     */
    private $paging;

    /**
     * @var PrimeGenInterface
     */
    private $primeGenerator;


    /**
     * Prime constructor.
     * @param string $type
     * @param array $pagingContents
     * @throws \Exception
     */
    public function __construct(string $type, array $pagingContents)
    {
        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        /** @var ContextInterface $context */
        $context = $this->giGetDi(ContextInterface::class, Context::class);

        $this->paging = $this->createPaging($type)->hydrate($pagingContents, $context->getEntriesTotal());

        $this->primeGenerator = $this->giGetDi(PrimeGenInterface::class, PrimeGen::class);
    }

    /**
     * @param string $type
     * @return PagingInterface
     * @throws \Exception
     */
    protected function createPaging(string $type)
    {
        $factory = $this->giGetComponentFactory()->getPagingFactory();

        switch ($type) {
            case TreeInterface::TYPE_DROPDOWN:
                $paging = $factory->createDropdown();
                break;
            case TreeInterface::TYPE_COMMON:
                $paging =$factory->createCommon();
                break;
            case TreeInterface::TYPE_DASH:
                $paging = $factory->createDash();
                break;
            case TreeInterface::TYPE_SNAPSHOT:
                $paging =$factory->createSnapshot();
                break;
            case TreeInterface::TYPE_WINGS:
                $paging = $factory->createWings();
                break;
            default:
                $paging = null;
                $this->giThrowNotFoundException('Paging', $type);
        }

        return $paging;
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return PagingInterface
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * @return PrimeGenInterface
     */
    public function getPrimeGenerator()
    {
        return $this->primeGenerator;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $model = $this->getPaging()->getPagingModel();

        $numbers = $this->getPrimeGenerator()
            ->create($model->getEntriesTotal())
            ->slice($model->getFirstShowedEntry(), $model->getLastShowedEntry());

        $this->getView()->setPaging($this->getPaging())->getWidget()->setNumbers($numbers);

        return $this->getView()->toString();
    }
}