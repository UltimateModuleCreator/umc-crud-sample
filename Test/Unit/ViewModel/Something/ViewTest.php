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

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\Data\SomethingInterface;
use Umc\Sample\Api\SomethingRepositoryInterface;
use Umc\Sample\ViewModel\Something\View;

class ViewTest extends TestCase
{
    /**
     * @var RequestInterface | MockObject
     */
    private $request;
    /**
     * @var SomethingRepositoryInterface | MockObject
     */
    private $somethingRepository;
    /**
     * @var View
     */
    private $view;

    /**
     * setup tests
     */
    protected function setUp(): void
    {
        $this->request = $this->createMock(RequestInterface::class);
        $this->somethingRepository = $this->createMock(SomethingRepositoryInterface::class);
        $this->view = new View(
            $this->request,
            $this->somethingRepository
        );
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\View::getSomething
     * @covers \Umc\Sample\ViewModel\Something\View::__construct
     */
    public function testGetSomething()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(1);
        $something = $this->createMock(SomethingInterface::class);
        $this->somethingRepository->expects($this->once())->method('get')->willReturn($something);
        $this->assertEquals($something, $this->view->getSomething());
        //call twice to test memoizing
        $this->assertEquals($something, $this->view->getSomething());
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\View::getSomething
     * @covers \Umc\Sample\ViewModel\Something\View::__construct
     */
    public function testGetSomethingWithException()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(1);
        $this->somethingRepository->expects($this->once())->method('get')->willThrowException(
            $this->createMock(NoSuchEntityException::class)
        );
        $this->assertFalse($this->view->getSomething());
        //call twice to test memoizing
        $this->assertFalse($this->view->getSomething());
    }

    /**
     * @covers \Umc\Sample\ViewModel\Something\View::getSomething
     * @covers \Umc\Sample\ViewModel\Something\View::__construct
     */
    public function testGetSomethingNoId()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(null);
        $this->somethingRepository->expects($this->never())->method('get');
        $this->assertFalse($this->view->getSomething());
        //call twice to test memoizing
        $this->assertFalse($this->view->getSomething());
    }
}
