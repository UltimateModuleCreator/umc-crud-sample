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

namespace Umc\Sample\Test\Unit\Controller\Something;

use Magento\Backend\Model\View\Result\Forward;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Page\Config;
use Magento\Framework\View\Page\Title;
use Magento\Framework\View\Result\Page;
use Magento\Theme\Block\Html\Breadcrumbs;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Api\SomethingRepositoryInterface;
use Umc\Sample\Controller\Something\View;
use Umc\Sample\Model\Something;
use Umc\Sample\ViewModel\Something\Url;

class ViewTest extends TestCase
{
    /**
     * @var Context | MockObject
     */
    private $context;
    /**
     * @var SomethingRepositoryInterface | MockObject
     */
    private $somethingRepository;
    /**
     * @var Url | MockObject
     */
    private $urlModel;
    /**
     * @var ScopeConfigInterface | MockObject
     */
    private $scopeConfig;
    /**
     * @var RequestInterface | MockObject
     */
    private $request;
    /**
     * @var ResultFactory | MockObject
     */
    private $resultFactory;
    /**
     * @var Config | MockObject
     */
    private $pageConfig;
    /**
     * @var Title | MockObject
     */
    private $pageTitle;
    /**
     * @var LayoutInterface | MockObject
     */
    private $layout;
    /**
     * @var UrlInterface | MockObject
     */
    private $url;
    /**
     * @var Page | MockObject
     */
    private $page;
    /**
     * @var View
     */
    private $view;

    /**
     * setup tests
     */
    protected function setUp()
    {
        $this->context = $this->createMock(Context::class);
        $this->somethingRepository = $this->createMock(SomethingRepositoryInterface::class);
        $this->urlModel = $this->createMock(Url::class);
        $this->scopeConfig = $this->createMock(ScopeConfigInterface::class);
        $this->request = $this->createMock(RequestInterface::class);
        $this->context->method('getRequest')->willReturn($this->request);
        $this->layout = $this->createMock(LayoutInterface::class);
        $this->page = $this->createMock(Page::class);
        $this->resultFactory = $this->createMock(ResultFactory::class);
        $this->pageConfig = $this->createMock(Config::class);
        $this->page->method('getConfig')->willReturn($this->pageConfig);
        $this->pageTitle = $this->createMock(Title::class);
        $this->pageConfig->method('getTitle')->willReturn($this->pageTitle);
        $this->page->method('getLayout')->willReturn($this->layout);
        $this->url = $this->createMock(UrlInterface::class);
        $this->context->method('getUrl')->willReturn($this->url);
        $this->context->method('getResultFactory')->willReturn($this->resultFactory);

        $this->view = new View(
            $this->context,
            $this->somethingRepository,
            $this->urlModel,
            $this->scopeConfig
        );
    }

    /**
     * @covers \Umc\Sample\Controller\Something\View::execute
     * @covers \Umc\Sample\Controller\Something\View::__construct
     */
    public function testExecute()
    {
        $this->request->method('getParam')->willReturn(1);
        $this->somethingRepository->method('get')->willReturn($this->getSomethingMock(true));
        $this->resultFactory->method('create')->willReturn($this->page);
        $this->scopeConfig->method('isSetFlag')->willReturn(true);
        $crumbs = $this->createMock(Breadcrumbs::class);
        $titleBlock = $this->createMock(\Magento\Theme\Block\Html\Title::class);
        $this->layout->expects($this->exactly(2))->method('getBlock')->willReturnMap([
            ['page.main.title' , $titleBlock],
            ['breadcrumbs', $crumbs]
        ]);
        $crumbs->expects($this->exactly(3))->method('addCrumb');
        $this->assertEquals($this->page, $this->view->execute());
    }

    /**
     * @covers \Umc\Sample\Controller\Something\View::execute
     * @covers \Umc\Sample\Controller\Something\View::__construct
     */
    public function testExecuteNoBreadcrumbs()
    {
        $this->request->method('getParam')->willReturn(1);
        $this->somethingRepository->method('get')->willReturn($this->getSomethingMock(true));
        $this->resultFactory->method('create')->willReturn($this->page);
        $this->scopeConfig->method('isSetFlag')->willReturn(false);
        $titleBlock = $this->createMock(\Magento\Theme\Block\Html\Title::class);
        $this->layout->expects($this->once())->method('getBlock')->willReturn($titleBlock);
        $this->assertEquals($this->page, $this->view->execute());
    }

    /**
     * @covers \Umc\Sample\Controller\Something\View::execute
     * @covers \Umc\Sample\Controller\Something\View::getNoRouteResult
     * @covers \Umc\Sample\Controller\Something\View::__construct
     */
    public function testExecuteWithException()
    {
        $this->request->method('getParam')->willReturn(1);
        $this->somethingRepository->method('get')->willThrowException(
            $this->createMock(NoSuchEntityException::class)
        );
        $forward = $this->createMock(Forward::class);
        $this->resultFactory->method('create')->willReturn($forward);
        $forward->expects($this->once())->method('forward');
        $this->scopeConfig->expects($this->never())->method('isSetFlag');
        $this->assertEquals($forward, $this->view->execute());
    }

    /**
     * @param $isActive
     * @return MockObject
     * @throws \ReflectionException
     */
    private function getSomethingMock($isActive)
    {
        $mock = $this->createMock(Something::class);
        $mock->method('getIsActive')->willReturn($isActive);
        return $mock;
    }
}
