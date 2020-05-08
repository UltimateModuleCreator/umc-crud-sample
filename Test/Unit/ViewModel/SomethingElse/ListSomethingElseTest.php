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

namespace Umc\Sample\Test\Unit\ViewModel\SomethingElse;

use Magento\Framework\View\Element\BlockFactory;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Theme\Block\Html\Pager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Model\ResourceModel\SomethingElse\CollectionFactory;
use Umc\Sample\Model\ResourceModel\SomethingElse\Collection;
use Umc\Sample\ViewModel\SomethingElse\ListSomethingElse;

class ListSomethingElseTest extends TestCase
{
    /**
     * @var CollectionFactory | MockObject
     */
    private $collectionFactory;
    /**
     * @var BlockFactory | MockObject
     */
    private $blockFactory;
    /**
     * @var Collection
     */
    private $collection;
    /**
     * @var ListSomethingElse
     */
    private $listSomethingElse;
    /**
     * @var Pager | MockObject
     */
    private $pager;

    /**
     * setup tests
     */
    protected function setUp()
    {
        $this->collectionFactory = $this->createMock(CollectionFactory::class);
        $this->blockFactory = $this->createMock(BlockFactory::class);
        $this->collection = $this->createMock(Collection::class);
        $this->pager = $this->createMock(Pager::class);
        $this->listSomethingElse = new ListSomethingElse(
            $this->collectionFactory,
            $this->blockFactory
        );
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::getCollection
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::processCollection
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::__construct
     */
    public function testGetSomethingElseCollection()
    {
        $this->collectionFactory->expects($this->once())->method('create')->willReturn($this->collection);
        $this->collection->expects($this->once())->method('addFieldToFilter');
        $this->blockFactory->expects($this->once())->method('createBlock')->willReturn($this->pager);
        $this->assertEquals($this->collection, $this->listSomethingElse->getCollection());
        //call twice to test memoizing
        $this->assertEquals($this->collection, $this->listSomethingElse->getCollection());
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::getPagerHtml
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::processCollection
     * @covers \Umc\Sample\ViewModel\SomethingElse\ListSomethingElse::__construct
     */
    public function testGetPagerHtml()
    {
        $this->pager->method('toHtml')->willReturn('pager_html');
        $this->collectionFactory->expects($this->once())->method('create')->willReturn($this->collection);
        $this->blockFactory->expects($this->once())->method('createBlock')->willReturn($this->pager);
        $this->assertEquals('pager_html', $this->listSomethingElse->getPagerHtml());
        //call twice to test memoizing
        $this->assertEquals('pager_html', $this->listSomethingElse->getPagerHtml());
    }
}
