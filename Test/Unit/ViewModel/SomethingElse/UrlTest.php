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

use Magento\Framework\UrlInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\ViewModel\SomethingElse\Url;

class UrlTest extends TestCase
{
    /**
     * @var UrlInterface | MockObject
     */
    private $urlBuilder;
    /**
     * @var SomethingElseInterface | MockObject
     */
    private $somethingElse;
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
        $this->somethingElse = $this->createMock(SomethingElseInterface::class);
        $this->url = new Url(
            $this->urlBuilder
        );
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::getListUrl
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::__construct
     */
    public function testGetListUrl()
    {
        $this->urlBuilder->expects($this->once())->method('getUrl')->willReturnArgument(0);
        $this->assertEquals('sample/somethingelse/index', $this->url->getListUrl());
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::getSomethingElseUrl
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::getSomethingElseUrlById
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::__construct
     */
    public function testGetSomethingElseUrl()
    {
        $somethingElse = $this->createMock(SomethingElseInterface::class);
        $somethingElse->method('getId')->willReturn(1);
        $this->urlBuilder->expects($this->once())->method('getUrl')->with('sample/somethingelse/view', ['id' => 1])
            ->willReturn('url');
        $this->assertEquals('url', $this->url->getSomethingElseUrl($somethingElse));
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::getSomethingElseUrlById
     * @covers \Umc\Sample\ViewModel\SomethingElse\Url::__construct
     */
    public function testGetSomethingElseUrlById()
    {
        $this->urlBuilder->expects($this->once())->method('getUrl')->with('sample/somethingelse/view', ['id' => 1])
            ->willReturn('url');
        $this->assertEquals('url', $this->url->getSomethingElseUrlById(1));
    }
}
