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

use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Umc\Sample\Model\Something;

class SomethingTest extends TestCase
{
    /**
     * @var Something
     */
    private $something;
    /**
     * @var Json | MockObject
     */
    private $json;

    /**
     * setup tests
     */
    protected function setUp()
    {
        $this->json = $this->createMock(Json::class);
        $om = new ObjectManager($this);
        $this->something = $om->getObject(Something::class, ['json' => $this->json]);
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSomethingId
     * @covers \Umc\Sample\Model\Something::setSomethingId
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSomethingId()
    {
        $this->something->setSomethingId(1);
        $this->assertEquals(1, $this->something->getSomethingId());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSomethingElseId
     * @covers \Umc\Sample\Model\Something::setSomethingElseId
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSomethingElseId()
    {
        $this->something->setSomethingElseId(1);
        $this->assertEquals(1, $this->something->getSomethingElseId());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getTitle
     * @covers \Umc\Sample\Model\Something::setTitle
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetTitle()
    {
        $this->something->setTitle("something");
        $this->assertEquals("something", $this->something->getTitle());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getIsActive
     * @covers \Umc\Sample\Model\Something::setIsActive
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetIsActive()
    {
        $this->something->setIsActive(1);
        $this->assertEquals(1, $this->something->getIsActive());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getTextarea
     * @covers \Umc\Sample\Model\Something::setTextarea
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetTextarea()
    {
        $this->something->setTextarea("textarea");
        $this->assertEquals("textarea", $this->something->getTextarea());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getWysiwyg
     * @covers \Umc\Sample\Model\Something::setWysiwyg
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetWysiwyg()
    {
        $this->something->setWysiwyg("wysiwyg");
        $this->assertEquals("wysiwyg", $this->something->getWysiwyg());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSomeDate
     * @covers \Umc\Sample\Model\Something::setSomeDate
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSomeDate()
    {
        $this->something->setSomeDate("2020-01-01");
        $this->assertEquals("2020-01-01", $this->something->getSomeDate());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getDateTime
     * @covers \Umc\Sample\Model\Something::setDateTime
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetDateTime()
    {
        $this->something->setDateTime("2020-01-01");
        $this->assertEquals("2020-01-01", $this->something->getDateTime());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getCountry
     * @covers \Umc\Sample\Model\Something::setCountry
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetCountry()
    {
        $this->something->setCountry("NL");
        $this->assertEquals("NL", $this->something->getCountry());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getCountryMultiselect
     * @covers \Umc\Sample\Model\Something::setCountryMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetCountryMultiselect()
    {
        $this->something->setCountryMultiselect("NL,RO");
        $this->assertEquals("NL,RO", $this->something->getCountryMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSimpleCountry
     * @covers \Umc\Sample\Model\Something::setSimpleCountry
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSimpleCountry()
    {
        $this->something->setSimpleCountry("NL");
        $this->assertEquals("NL", $this->something->getSimpleCountry());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSimpleCountryMultiselect
     * @covers \Umc\Sample\Model\Something::setSimpleCountryMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSimpleCountryMultiselect()
    {
        $this->something->setSimpleCountryMultiselect("NL,RO");
        $this->assertEquals("NL,RO", $this->something->getSimpleCountryMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getImage
     * @covers \Umc\Sample\Model\Something::setImage
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetImage()
    {
        $this->something->setImage("image.png");
        $this->assertEquals("image.png", $this->something->getImage());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getFile
     * @covers \Umc\Sample\Model\Something::setFile
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetFile()
    {
        $this->something->setFile("file.pdf");
        $this->assertEquals("file.pdf", $this->something->getFile());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getFlag
     * @covers \Umc\Sample\Model\Something::setFlag
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetFlag()
    {
        $this->something->setFlag(1);
        $this->assertEquals(1, $this->something->getFlag());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getProductAttribute
     * @covers \Umc\Sample\Model\Something::setProductAttribute
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetProductAttribute()
    {
        $this->something->setProductAttribute("color");
        $this->assertEquals("color", $this->something->getProductAttribute());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getProductAttributeMultiselect
     * @covers \Umc\Sample\Model\Something::setProductAttributeMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetProductAttributeMultiselect()
    {
        $this->something->setProductAttributeMultiselect("color,price");
        $this->assertEquals("color,price", $this->something->getProductAttributeMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getProductAttributeSet
     * @covers \Umc\Sample\Model\Something::setProductAttributeSet
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetProductAttributeSet()
    {
        $this->something->setProductAttributeSet(4);
        $this->assertEquals(4, $this->something->getProductAttributeSet());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getProductAttributeSetMultiselect
     * @covers \Umc\Sample\Model\Something::setProductAttributeSetMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetProductAttributeSetMultiselect()
    {
        $this->something->setProductAttributeSetMultiselect("4,5");
        $this->assertEquals("4,5", $this->something->getProductAttributeSetMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getRegularSelect
     * @covers \Umc\Sample\Model\Something::setRegularSelect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetRegularSelect()
    {
        $this->something->setRegularSelect(1);
        $this->assertEquals(1, $this->something->getRegularSelect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getRegularMultiselect
     * @covers \Umc\Sample\Model\Something::setRegularMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetRegularMultiselect()
    {
        $this->something->setRegularMultiselect("1,3");
        $this->assertEquals("1,3", $this->something->getRegularMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSomeDecimal
     * @covers \Umc\Sample\Model\Something::setSomeDecimal
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSomeDecimal()
    {
        $this->something->setSomeDecimal(2.000);
        $this->assertEquals(2.000, $this->something->getSomeDecimal());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSomeInteger
     * @covers \Umc\Sample\Model\Something::setSomeInteger
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSomeInteger()
    {
        $this->something->setSomeInteger(3);
        $this->assertEquals(3, $this->something->getSomeInteger());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getColor
     * @covers \Umc\Sample\Model\Something::setColor
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetColor()
    {
        $this->something->setColor(1);
        $this->assertEquals(1, $this->something->getColor());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getColorMultiselect
     * @covers \Umc\Sample\Model\Something::setColorMultiselect
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetColorMultiselect()
    {
        $this->something->setColorMultiselect("1,4");
        $this->assertEquals("1,4", $this->something->getColorMultiselect());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSerializedField
     * @covers \Umc\Sample\Model\Something::setSerializedField
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSerializedField()
    {
        $this->something->setSerializedField("serialized");
        $this->assertEquals("serialized", $this->something->getSerializedField());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSerializedFieldAsArray
     * @covers \Umc\Sample\Model\Something::setSerializedField
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSerializedFieldAsArray()
    {
        $this->something->setSerializedField("serialized");
        $this->json->expects($this->once())->method('unserialize')->willReturnArgument(0);
        $this->assertEquals("serialized", $this->something->getSerializedFieldAsArray());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getSerializedFieldAsArray
     * @covers \Umc\Sample\Model\Something::setSerializedField
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetSerializedFieldAsArrayWithException()
    {
        $this->something->setSerializedField("serialized");
        $this->json->expects($this->once())->method('unserialize')->willThrowException(new \Exception());
        $this->assertEquals([], $this->something->getSerializedFieldAsArray());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getStoreId
     * @covers \Umc\Sample\Model\Something::setStoreId
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetStoreId()
    {
        $this->something->setStoreId([1, 2]);
        $this->assertEquals([1, 2], $this->something->getStoreId());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getCreatedAt
     * @covers \Umc\Sample\Model\Something::setCreatedAt
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetCreatedAt()
    {
        $this->something->setCreatedAt("2020-01-01");
        $this->assertEquals("2020-01-01", $this->something->getCreatedAt());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getUpdatedAt
     * @covers \Umc\Sample\Model\Something::setUpdatedAt
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetUpdatedAt()
    {
        $this->something->setUpdatedAt("2020-01-01");
        $this->assertEquals("2020-01-01", $this->something->getUpdatedAt());
    }

    /**
     * @covers \Umc\Sample\Model\Something::getIdentities
     * @covers \Umc\Sample\Model\Something::__construct
     */
    public function testGetIdentities()
    {
        $this->assertEquals(['sample_something_'], $this->something->getIdentities());
        $this->something->setSomethingId(1);
        $this->assertEquals(['sample_something_1'], $this->something->getIdentities());
    }
}
