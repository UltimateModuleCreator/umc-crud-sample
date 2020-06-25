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

namespace Umc\Sample\Test\Unit\Source;

use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteriaBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\Api\Data\SomethingElseSearchResultsInterface;
use Umc\Sample\Api\SomethingElseListRepositoryInterface;
use Umc\Sample\Source\SomethingElse;

class SomethingElseTest extends TestCase
{
    /**
     * @var SomethingElseListRepositoryInterface | MockObject
     */
    private $repository;
    /**
     * @var SearchCriteriaBuilder | MockObject
     */
    private $searchCriteriaBuilder;
    /**
     * @var SearchCriteria | MockObject
     */
    private $searchCriteria;
    /**
     * @var SomethingElseSearchResultsInterface | MockObject
     */
    private $searchResults;
    /**
     * @var SomethingElse
     */
    private $somethingElse;

    /**
     * setup tests
     */
    protected function setUp(): void
    {
        $this->repository = $this->createMock(SomethingElseListRepositoryInterface::class);
        $this->searchCriteriaBuilder = $this->createMock(SearchCriteriaBuilder::class);
        $this->searchCriteria = $this->createMock(SearchCriteria::class);
        $this->searchResults = $this->createMock(SomethingElseSearchResultsInterface::class);
        $this->somethingElse = new SomethingElse(
            $this->repository,
            $this->searchCriteriaBuilder
        );
    }

    /**
     * @covers \Umc\Sample\Source\SomethingElse::toOptionArray
     * @covers \Umc\Sample\Source\SomethingElse::__construct
     */
    public function testToOptionArray()
    {
        $this->searchCriteriaBuilder->expects($this->once())->method('create')->willReturn($this->searchCriteria);
        $this->repository->expects($this->once())->method('getList')->willReturn($this->searchResults);
        $this->searchResults->expects($this->once())->method('getItems')->willReturn([
            $this->getSomethingElseMock(1, 'something else 1'),
            $this->getSomethingElseMock(3, 'something else 3'),
            $this->getSomethingElseMock(2, 'something else 2'),
        ]);
        $expected = [
            [
                'value' => 1,
                'label' => 'something else 1'
            ],
            [
                'value' => 2,
                'label' => 'something else 2'
            ],
            [
                'value' => 3,
                'label' => 'something else 3'
            ],
        ];
        $this->assertEquals($expected, $this->somethingElse->toOptionArray());
        //call twice to test memoizing
        $this->assertEquals($expected, $this->somethingElse->toOptionArray());
    }

    /**
     * @param $id
     * @param $name
     * @return MockObject
     */
    private function getSomethingElseMock($id, $name)
    {
        $mock = $this->createMock(SomethingElseInterface::class);
        $mock->method('getSomethingElseId')->willReturn($id);
        $mock->method('getName')->willReturn($name);
        return $mock;
    }
}
