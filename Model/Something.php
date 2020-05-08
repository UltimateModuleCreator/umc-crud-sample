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

namespace Umc\Sample\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Registry;
use Magento\Framework\Serialize\Serializer\Json;
use Umc\Sample\Api\Data\SomethingInterface;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;

class Something extends AbstractModel implements SomethingInterface, IdentityInterface
{
    /**
     * Cache tag
     *
     * @var string
     */
    public const CACHE_TAG = 'sample_something';
    /**
     * Cache tag
     *
     * @var string
     * phpcs:disable PSR2.Classes.PropertyDeclaration.Underscore,PSR12.Classes.PropertyDeclaration.Underscore
     */
    protected $_cacheTag = self::CACHE_TAG;
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'sample_something';
    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'something';

    /**
     * @var string
     */
    protected $_idFieldName = 'something_id';
    /**
     * @var Json
     */
    private $json;
    //phpcs enable

    /**
     * Something constructor.
     * @param Context $context
     * @param Registry $registry
     * @param Json $json
     * @param AbstractResource $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        Json $json,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->json = $json;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * @inheritdoc
     */
    public function setSomethingId($somethingId)
    {
        return $this->setData(self::SOMETHING_ID, $somethingId);
    }

    /**
     * @inheritdoc
     */
    public function getSomethingId()
    {
        return $this->getData(self::SOMETHING_ID);
    }

    /**
     * @inheritdoc
     */
    public function setSomethingElseId($somethingElseId)
    {
        return $this->setData(self::SOMETHING_ELSE_ID, $somethingElseId);
    }

    /**
     * @inheritdoc
     */
    public function getSomethingElseId()
    {
        return $this->getData(self::SOMETHING_ELSE_ID);
    }

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritdoc
     */
    public function setTextarea($textarea)
    {
        return $this->setData(self::TEXTAREA, $textarea);
    }

    /**
     * @inheritdoc
     */
    public function getTextarea()
    {
        return $this->getData(self::TEXTAREA);
    }

    /**
     * @inheritdoc
     */
    public function setWysiwyg($wysiwyg)
    {
        return $this->setData(self::WYSIWYG, $wysiwyg);
    }

    /**
     * @inheritdoc
     */
    public function getWysiwyg()
    {
        return $this->getData(self::WYSIWYG);
    }

    /**
     * @inheritdoc
     */
    public function setSomeDate($someDate)
    {
        return $this->setData(self::SOME_DATE, $someDate);
    }

    /**
     * @inheritdoc
     */
    public function getSomeDate()
    {
        return $this->getData(self::SOME_DATE);
    }

    /**
     * @inheritdoc
     */
    public function setDateTime($dateTime)
    {
        return $this->setData(self::DATE_TIME, $dateTime);
    }

    /**
     * @inheritdoc
     */
    public function getDateTime()
    {
        return $this->getData(self::DATE_TIME);
    }

    /**
     * @inheritdoc
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * @inheritdoc
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @inheritdoc
     */
    public function setCountryMultiselect($countryMultiselect)
    {
        return $this->setData(self::COUNTRY_MULTISELECT, $countryMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getCountryMultiselect()
    {
        return $this->getData(self::COUNTRY_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setSimpleCountry($simpleCountry)
    {
        return $this->setData(self::SIMPLE_COUNTRY, $simpleCountry);
    }

    /**
     * @inheritdoc
     */
    public function getSimpleCountry()
    {
        return $this->getData(self::SIMPLE_COUNTRY);
    }

    /**
     * @inheritdoc
     */
    public function setSimpleCountryMultiselect($simpleCountryMultiselect)
    {
        return $this->setData(self::SIMPLE_COUNTRY_MULTISELECT, $simpleCountryMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getSimpleCountryMultiselect()
    {
        return $this->getData(self::SIMPLE_COUNTRY_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @inheritdoc
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @inheritdoc
     */
    public function setFile($file)
    {
        return $this->setData(self::FILE, $file);
    }

    /**
     * @inheritdoc
     */
    public function getFile()
    {
        return $this->getData(self::FILE);
    }

    /**
     * @param int $flag
     * @return SomethingInterface
     */
    public function setFlag($flag)
    {
        return $this->setData(self::FLAG, $flag);
    }

    /**
     * @return int
     */
    public function getFlag()
    {
        return $this->getData(self::FLAG);
    }

    /**
     * @inheritdoc
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @inheritdoc
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritdoc
     */
    public function setProductAttribute($productAttribute)
    {
        return $this->setData(self::PRODUCT_ATTRIBUTE, $productAttribute);
    }

    /**
     * @inheritdoc
     */
    public function getProductAttribute()
    {
        return $this->getData(self::PRODUCT_ATTRIBUTE);
    }

    /**
     * @inheritdoc
     */
    public function setProductAttributeMultiselect($productAttributeMultiselect)
    {
        return $this->setData(self::PRODUCT_ATTRIBUTE_MULTISELECT, $productAttributeMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getProductAttributeMultiselect()
    {
        return $this->getData(self::PRODUCT_ATTRIBUTE_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setProductAttributeSet($productAttributeSet)
    {
        return $this->setData(self::PRODUCT_ATTRIBUTE_SET, $productAttributeSet);
    }

    /**
     * @inheritdoc
     */
    public function getProductAttributeSet()
    {
        return $this->getData(self::PRODUCT_ATTRIBUTE_SET);
    }

    /**
     * @inheritdoc
     */
    public function setProductAttributeSetMultiselect($productAttributeSetMultiselect)
    {
        return $this->setData(self::PRODUCT_ATTRIBUTE_SET_MULTISELECT, $productAttributeSetMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getProductAttributeSetMultiselect()
    {
        return $this->getData(self::PRODUCT_ATTRIBUTE_SET_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setRegularSelect($regularSelect)
    {
        return $this->setData(self::REGULAR_SELECT, $regularSelect);
    }

    /**
     * @inheritdoc
     */
    public function getRegularSelect()
    {
        return $this->getData(self::REGULAR_SELECT);
    }

    /**
     * @inheritdoc
     */
    public function setRegularMultiselect($regularMultiselect)
    {
        return $this->setData(self::REGULAR_MULTISELECT, $regularMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getRegularMultiselect()
    {
        return $this->getData(self::REGULAR_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setSomeDecimal($someDecimal)
    {
        return $this->setData(self::SOME_DECIMAL, $someDecimal);
    }

    /**
     * @inheritdoc
     */
    public function getSomeDecimal()
    {
        return $this->getData(self::SOME_DECIMAL);
    }

    /**
     * @inheritdoc
     */
    public function setSomeInteger($someInteger)
    {
        return $this->setData(self::SOME_INTEGER, $someInteger);
    }

    /**
     * @inheritdoc
     */
    public function getSomeInteger()
    {
        return $this->getData(self::SOME_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function setColor($color)
    {
        return $this->setData(self::COLOR, $color);
    }

    /**
     * @inheritdoc
     */
    public function getColor()
    {
        return $this->getData(self::COLOR);
    }

    /**
     * @inheritdoc
     */
    public function setColorMultiselect($colorMultiselect)
    {
        return $this->setData(self::COLOR_MULTISELECT, $colorMultiselect);
    }

    /**
     * @inheritdoc
     */
    public function getColorMultiselect()
    {
        return $this->getData(self::COLOR_MULTISELECT);
    }

    /**
     * @inheritdoc
     */
    public function setSerializedField($serializedField)
    {
        return $this->setData(self::SERIALIZED_FIELD, $serializedField);
    }

    /**
     * @inheritdoc
     */
    public function getSerializedField()
    {
        return $this->getData(self::SERIALIZED_FIELD);
    }

    /**
     * @return array
     */
    public function getSerializedFieldAsArray()
    {
        try {
            return $this->json->unserialize($this->getSerializedField());
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param array $storeId
     * @return SomethingInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @return array
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @inheritdoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getSomethingId()];
    }
}
