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

namespace Umc\Sample\Test\Unit\Plugin\Theme\Block\Html;

use Magento\Framework\App\Request\Http;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\Tree;
use Magento\Framework\Data\Tree\Node;
use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\DataObject;
use Magento\Theme\Block\Html\Topmenu;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin;

class TopmenuPluginTest extends TestCase
{
    /**
     * @var RequestInterface | MockObject
     */
    private $request;
    /**
     * @var NodeFactory | MockObject
     */
    private $nodeFactory;
    /**
     * @var Topmenu | MockObject
     */
    private $subject;
    /**
     * @var TopmenuPlugin
     */
    private $topmenuPlugin;
    /**
     * @var Node | MockObject
     */
    private $menu;
    /**
     * @var Tree | MockObject
     */
    private $tree;

    /**
     * setup tests
     */
    protected function setUp(): void
    {
        $this->request = $this->createMock(Http::class);
        $this->nodeFactory = $this->createMock(NodeFactory::class);
        $this->subject = $this->createMock(Topmenu::class);
        $this->menu = $this->createMock(Node::class);
        $this->tree = $this->createMock(Tree::class);
        $this->menu->method('getTree')->willReturn($this->tree);
        $this->subject->method('getMenu')->willReturn($this->menu);
        $this->topmenuPlugin = new TopmenuPlugin(
            $this->request,
            $this->nodeFactory,
            [
                [
                    'name' => 'node1',
                    'id' => 'id1',
                    'url' => [
                        'class' => new DataObject(['url' => 'url']),
                        'method' => 'getUrl'
                    ],
                    'activeHandles' => ['handle1', 'handle2']
                ],
                [
                    'name' => 'node2',
                    'id' => 'id2',
                    'url' => [
                        'class' => new DataObject(['url' => 'url2']),
                        'method' => 'getUrl'
                    ],
                    'activeHandles' => ['handle3']
                ],
                [
                    'name' => 'node3',
                    'id' => 'id3',
                    'url' => '',
                    'activeHandles' => ['handle3']
                ],
                [
                    'name' => 'node4',
                    'url' => '',
                    'activeHandles' => ['handle1', 'handle2']
                ],
            ]
        );
    }

    /**
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::beforeGetHtml
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::convertNodeData
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::__construct
     */
    public function testBeforeGetHtml()
    {
        $this->request->method('getFullActionName')->willReturn('handle2');
        $this->nodeFactory->expects($this->exactly(3))->method('create')
            ->with(
                $this->logicalOr(
                    [
                        'data' => [
                            'name' => 'node1',
                            'id' => 'id1',
                            'url' => 'url',
                            'is_active' => true
                        ],
                        'idField' => 'id',
                        'tree' => $this->tree
                    ],
                    [
                        'data' => [
                            'name' => 'node2',
                            'id' => 'id2',
                            'url' => 'url2',
                            'is_active' => false
                        ],
                        'idField' => 'id',
                        'tree' => $this->tree
                    ],
                    [
                        'data' => [
                            'name' => 'node3',
                            'id' => 'id3',
                            'url' => '#',
                            'is_active' => false
                        ],
                        'idField' => 'id',
                        'tree' => $this->tree
                    ]
                )
            )->willReturn($this->createMock(Node::class));
        $this->topmenuPlugin->beforeGetHtml($this->subject);
    }

    /**
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::afterGetCacheKeyInfo
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::__construct
     */
    public function testAfterGetCacheKeyInfo()
    {
        $result = ['data'];
        $this->request->method('getFullActionName')->willReturn('handle1');
        $expected = ['data', 'handle1'];
        $this->assertEquals($expected, $this->topmenuPlugin->afterGetCacheKeyInfo($this->subject, $result));
    }

    /**
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::afterGetCacheKeyInfo
     * @covers \Umc\Sample\Plugin\Theme\Block\Html\TopmenuPlugin::__construct
     */
    public function testAfterGetCacheKeyInfoNotActive()
    {
        $result = ['data'];
        $this->request->method('getFullActionName')->willReturn('dummy');
        $this->assertEquals($result, $this->topmenuPlugin->afterGetCacheKeyInfo($this->subject, $result));
    }
}
