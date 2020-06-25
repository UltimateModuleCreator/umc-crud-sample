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

namespace Umc\Sample\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Model\SomethingElse;

class SomethingElseTest extends TestCase
{
    /**
     * @var SomethingElse
     */
    private $somethingElse;

    /**
     * setup tests
     */
    protected function setUp(): void
    {
        $om = new ObjectManager($this);
        $this->somethingElse = $om->getObject(SomethingElse::class);
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getSomethingElseId
     * @covers \Umc\Sample\Model\SomethingElse::setSomethingElseId
     */
    public function testGetSomethingElseId()
    {
        $this->somethingElse->setSomethingElseId(1);
        $this->assertEquals(1, $this->somethingElse->getSomethingElseId());
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getName
     * @covers \Umc\Sample\Model\SomethingElse::setName
     */
    public function testGetName()
    {
        $this->somethingElse->setName("something else");
        $this->assertEquals("something else", $this->somethingElse->getName());
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getIsActive
     * @covers \Umc\Sample\Model\SomethingElse::setIsActive
     */
    public function testGetIsActive()
    {
        $this->somethingElse->setIsActive(1);
        $this->assertEquals(1, $this->somethingElse->getIsActive());
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getCreatedAt
     * @covers \Umc\Sample\Model\SomethingElse::setCreatedAt
     */
    public function testGetCreatedAt()
    {
        $this->somethingElse->setCreatedAt("2020-01-01");
        $this->assertEquals("2020-01-01", $this->somethingElse->getCreatedAt());
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getUpdatedAt
     * @covers \Umc\Sample\Model\SomethingElse::setUpdatedAt
     */
    public function testGetUpdatedAt()
    {
        $this->somethingElse->setUpdatedAt("2020-01-01");
        $this->assertEquals("2020-01-01", $this->somethingElse->getUpdatedAt());
    }

    /**
     * @covers \Umc\Sample\Model\SomethingElse::getIdentities
     */
    public function testGetIdentities()
    {
        $this->assertEquals(['sample_something_else_'], $this->somethingElse->getIdentities());
        $this->somethingElse->setSomethingElseId(1);
        $this->assertEquals(['sample_something_else_1'], $this->somethingElse->getIdentities());
    }
}
