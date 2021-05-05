<?php

namespace Prime\Component\Prime;

use GI\Component\Table\TableWithPaging\AbstractTable;
use Prime\Component\Prime\Context\Context;
use Prime\Component\Prime\View\View;
use Prime\Component\Prime\Model\PrimeGen;

use Prime\ServiceLocator\ServiceLocatorAwareTrait;

use Prime\Component\Prime\Context\ContextInterface;
use GI\Component\Paging\Base\PagingInterface;
use Prime\Component\Prime\View\ViewInterface;
use Prime\Module\Call\Route\Tree\TreeInterface;
use Prime\Component\Prime\Model\PrimeGenInterface;

class Prime extends AbstractTable implements PrimeInterface
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
        parent::__construct($pagingContents);

        $this->view = $this->giGetDi(ViewInterface::class, View::class);

        $this->paging = $this->createPaging($type)->hydrate($pagingContents, $this->getTotal());
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
    protected function getView()
    {
        return $this->view;
    }

    /**
     * @return PagingInterface
     */
    protected function getPaging()
    {
        return $this->paging;
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected function getTotal()
    {
        /** @var ContextInterface $context */
        $context = $this->giGetDi(ContextInterface::class, Context::class);

        return $context->getEntriesTotal();
    }

    /**
     * @return PrimeGenInterface
     * @throws \Exception
     */
    protected function getPrimeGenerator()
    {
        if (!($this->primeGenerator instanceof PrimeGenInterface)) {
            $this->primeGenerator = $this->giGetDi(PrimeGenInterface::class, PrimeGen::class);
        }

        return $this->primeGenerator;
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function getDataSource()
    {
        $pagingModel = $this->getPaging()->getPagingModel();

        return $this->getPrimeGenerator()
            ->create($pagingModel->getEntriesTotal())
            ->slice($pagingModel->getFirstShowedEntry(), $pagingModel->getLastShowedEntry());
    }
}