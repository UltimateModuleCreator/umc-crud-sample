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

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\Api\SomethingElseRepositoryInterface;
use Umc\Sample\ViewModel\SomethingElse\View;

class ViewTest extends TestCase
{
    /**
     * @var RequestInterface | MockObject
     */
    private $request;
    /**
     * @var SomethingElseRepositoryInterface | MockObject
     */
    private $somethingElseRepository;
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
        $this->somethingElseRepository = $this->createMock(SomethingElseRepositoryInterface::class);
        $this->view = new View(
            $this->request,
            $this->somethingElseRepository
        );
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::getSomethingElse
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::__construct
     */
    public function testGetSomethingElse()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(1);
        $somethingElse = $this->createMock(SomethingElseInterface::class);
        $this->somethingElseRepository->expects($this->once())->method('get')->willReturn($somethingElse);
        $this->assertEquals($somethingElse, $this->view->getSomethingElse());
        //call twice to test memoizing
        $this->assertEquals($somethingElse, $this->view->getSomethingElse());
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::getSomethingElse
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::__construct
     */
    public function testGetSomethingElseWithException()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(1);
        $this->somethingElseRepository->expects($this->once())->method('get')->willThrowException(
            $this->createMock(NoSuchEntityException::class)
        );
        $this->assertFalse($this->view->getSomethingElse());
        //call twice to test memoizing
        $this->assertFalse($this->view->getSomethingElse());
    }

    /**
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::getSomethingElse
     * @covers \Umc\Sample\ViewModel\SomethingElse\View::__construct
     */
    public function testGetSomethingElseNoId()
    {
        $this->request->expects($this->once())->method('getParam')->willReturn(null);
        $this->somethingElseRepository->expects($this->never())->method('get');
        $this->assertFalse($this->view->getSomethingElse());
        //call twice to test memoizing
        $this->assertFalse($this->view->getSomethingElse());
    }
}
