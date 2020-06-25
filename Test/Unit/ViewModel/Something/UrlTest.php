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

namespace Umc\Sample\Test\Unit\ViewModel\Something;

use Magento\Framework\UrlInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\Data\SomethingInterface;
use Umc\Sample\ViewModel\Something\Url;

class UrlTest extends TestCase
{
    /**
     * @var UrlInterface | MockObject
     */
    private $urlBuilder;
    /**
     * @var SomethingInterface | MockObject
     */
    private $something;
    /**
     * @var Url
     */
    private $url;

    /**
     * setup tests
     */
    protected function setUp(): void
    {
        $this->urlBuilder = $this->createMock(UrlInterface::class);
        $this->something = $this->createMock(SomethingInterface::class);
        $this->url = new Url(
            $this->urlBuilder
        );
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\Url::getListUrl
     * @covers \Umc\Sample\ViewModel\Something\Url::__construct
     */
    public function testGetListUrl()
    {
        $this->urlBuilder->expects($this->once())->method('getUrl')->willReturnArgument(0);
        $this->assertEquals('sample/something/index', $this->url->getListUrl());
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\Url::getSomethingUrl
     * @covers \Umc\Sample\ViewModel\Something\Url::getSomethingUrlById
     * @covers \Umc\Sample\ViewModel\Something\Url::__construct
     */
    public function testGetSomethingUrl()
    {
        $something = $this->createMock(SomethingInterface::class);
        $something->method('getId')->willReturn(1);
        $this->urlBuilder->expects($this->once())->method('getUrl')->with('sample/something/view', ['id' => 1])
            ->willReturn('url');
        $this->assertEquals('url', $this->url->getSomethingUrl($something));
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\Url::getSomethingUrlById
     * @covers \Umc\Sample\ViewModel\Something\Url::__construct
     */
    public function testGetSomethingUrlById()
    {
        $this->urlBuilder->expects($this->once())->method('getUrl')->with('sample/something/view', ['id' => 1])
            ->willReturn('url');
        $this->assertEquals('url', $this->url->getSomethingUrlById(1));
    }
}
