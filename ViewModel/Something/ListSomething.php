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

namespace Umc\Sample\ViewModel\Something;

use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\BlockFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Theme\Block\Html\Pager;
use Umc\Sample\Api\Data\SomethingInterface;
use Umc\Sample\Model\ResourceModel\Something\Collection;
use Umc\Sample\Model\ResourceModel\Something\CollectionFactory;

class ListSomething implements ArgumentInterface
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
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
    private $somethingCollection;
    /**
     * @var Pager
     */
    private $pager;

    /**
     * ListSomething constructor.
     * @param CollectionFactory $collectionFactory
     * @param BlockFactory $blockFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        CollectionFactory $collectionFactory,
        BlockFactory $blockFactory
    ) {
        $this->storeManager = $storeManager;
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
        return $this->somethingCollection;
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
        if ($this->somethingCollection === null) {
            $this->somethingCollection = $this->collectionFactory->create();
            $this->somethingCollection->addFieldToFilter(SomethingInterface::IS_ACTIVE, 1);
            $this->somethingCollection->addStoreFilter($this->storeManager->getStore()->getId());
            $this->somethingCollection->setOrder(SomethingInterface::TITLE, SortOrder::SORT_ASC);
            $this->pager = $this->blockFactory->createBlock(Pager::class);
            $this->pager->setCollection($this->somethingCollection);
        }
    }
}
