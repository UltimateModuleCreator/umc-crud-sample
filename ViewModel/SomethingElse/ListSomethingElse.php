<?php

/**
 * Umc_Sample extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Umc
 * @package   Umc_Sample
 * @copyright 2020 Marius Strajeru
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Marius Strajeru
 */

declare(strict_types=1);

namespace Umc\Sample\ViewModel\SomethingElse;

use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\BlockFactory;
use Magento\Theme\Block\Html\Pager;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\Model\ResourceModel\SomethingElse\Collection;
use Umc\Sample\Model\ResourceModel\SomethingElse\CollectionFactory;

class ListSomethingElse implements ArgumentInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var BlockFactory
     */
    private $blockFactory;
    /**
     * @var Collection
     */
    private $somethingElseCollection;
    /**
     * @var Pager
     */
    private $pager;

    /**
     * ListSomethingElse constructor.
     * @param CollectionFactory $collectionFactory
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        BlockFactory $blockFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->blockFactory = $blockFactory;
    }

    /**
     * @return Collection
     * @throws NoSuchEntityException
     */
    public function getCollection()
    {
        $this->processCollection();
        return $this->somethingElseCollection;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getPagerHtml()
    {
        $this->processCollection();
        return $this->pager->toHtml();
    }

    /**
     * @throws NoSuchEntityException
     */
    private function processCollection()
    {
        if ($this->somethingElseCollection === null) {
            $this->somethingElseCollection = $this->collectionFactory->create();
            $this->somethingElseCollection->addFieldToFilter(SomethingElseInterface::IS_ACTIVE, 1);
            $this->somethingElseCollection->setOrder(SomethingElseInterface::NAME, SortOrder::SORT_ASC);
            $this->pager = $this->blockFactory->createBlock(Pager::class);
            $this->pager->setCollection($this->somethingElseCollection);
        }
    }
}
