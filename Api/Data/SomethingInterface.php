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

namespace Umc\Sample\Api\Data;

/**
 * @api
 */
interface SomethingInterface
{
    /**
     * attribute constants
     */
    public const SOMETHING_ID = 'something_id';
    public const SOMETHING_ELSE_ID = 'something_else_id';
    public const TITLE = 'title';
    public const TEXTAREA = 'textarea';
    public const WYSIWYG = 'wysiwyg';
    public const SOME_DATE = 'some_date';
    public const DATE_TIME = 'date_time';
    public const COUNTRY = 'country';
    public const SIMPLE_COUNTRY = 'simple_country';
    public const FLAG = 'flag';
    public const COUNTRY_MULTISELECT  = 'country_multiselect';
    public const SIMPLE_COUNTRY_MULTISELECT = 'simple_country_multiselect';
    public const IS_ACTIVE = 'is_active';
    public const PRODUCT_ATTRIBUTE = 'product_attribute';
    public const PRODUCT_ATTRIBUTE_MULTISELECT = 'product_attribute_multiselect';
    public const PRODUCT_ATTRIBUTE_SET = 'product_attribute_set';
    public const PRODUCT_ATTRIBUTE_SET_MULTISELECT = 'product_attribute_set_multiselect';
    public const REGULAR_SELECT = 'regular_select';
    public const REGULAR_MULTISELECT = 'regular_multiselect';
    public const SOME_DECIMAL = 'some_decimal';
    public const SOME_INTEGER = 'some_integer';
    public const COLOR = 'color';
    public const COLOR_MULTISELECT = 'color_multiselect';
    public const IMAGE = 'image';
    public const FILE = 'file';
    public const SERIALIZED_FIELD = 'serialized_field';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const STORE_ID = 'store_id';

    /**
     * @param int $somethingId
     * @return SomethingInterface
     */
    public function setId($somethingId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $somethingId
     * @return SomethingInterface
     */
    public function setSomethingId($somethingId);

    /**
     * @return int
     */
    public function getSomethingId();

    /**
     * @param int $somethingElseId
     * @return SomethingInterface
     */
    public function setSomethingElseId($somethingElseId);

    /**
     * @return int
     */
    public function getSomethingElseId();

    /**
     * @param string $title
     * @return SomethingInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $textarea
     * @return SomethingInterface
     */
    public function setTextarea($textarea);

    /**
     * @return string
     */
    public function getTextarea();

    /**
     * @param string $wysiwyg
     * @return SomethingInterface
     */
    public function setWysiwyg($wysiwyg);

    /**
     * @return string
     */
    public function getWysiwyg();

    /**
     * @param string $someDate
     * @return SomethingInterface
     */
    public function setSomeDate($someDate);

    /**
     * @return string
     */
    public function getSomeDate();

    /**
     * @param string $dateTime
     * @return SomethingInterface
     */
    public function setDateTime($dateTime);

    /**
     * @return string
     */
    public function getDateTime();

    /**
     * @param string $country
     * @return SomethingInterface
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $simpleCountry
     * @return SomethingInterface
     */
    public function setSimpleCountry($simpleCountry);

    /**
     * @return string
     */
    public function getSimpleCountry();

    /**
     * @param string $countryMultiselect
     * @return SomethingInterface
     */
    public function setCountryMultiselect($countryMultiselect);

    /**
     * @return string
     */
    public function getCountryMultiselect();

    /**
     * @param string $countryMultiselect
     * @return SomethingInterface
     */
    public function setSimpleCountryMultiselect($simpleCountryMultiselect);

    /**
     * @return string
     */
    public function getSimpleCountryMultiselect();

    /**
     * @param string $image
     * @return SomethingInterface
     */
    public function setImage($image);

    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $file
     * @return SomethingInterface
     */
    public function setFile($file);

    /**
     * @return string
     */
    public function getFile();

    /**
     * @param int $flag
     * @return SomethingInterface
     */
    public function setFlag($flag);

    /**
     * @return int
     */
    public function getFlag();

    /**
     * @param bool $isActive
     * @return SomethingInterface
     */
    public function setIsActive($isActive);

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @param string $productAttribute
     * @return SomethingInterface
     */
    public function setProductAttribute($productAttribute);

    /**
     * @return string
     */
    public function getProductAttribute();

    /**
     * @param string $productAttributeMultiselect
     * @return SomethingInterface
     */
    public function setProductAttributeMultiselect($productAttributeMultiselect);

    /**
     * @return string
     */
    public function getProductAttributeMultiselect();

    /**
     * @param int $productAttributeSet
     * @return SomethingInterface
     */
    public function setProductAttributeSet($productAttributeSet);

    /**
     * @return int
     */
    public function getProductAttributeSet();

    /**
     * @param string $productAttributeSetMultiselect
     * @return SomethingInterface
     */
    public function setProductAttributeSetMultiselect($productAttributeSetMultiselect);

    /**
     * @return string
     */
    public function getProductAttributeSetMultiselect();

    /**
     * @param int $regularSelect
     * @return SomethingInterface
     */
    public function setRegularSelect($regularSelect);

    /**
     * @return int
     */
    public function getRegularSelect();

    /**
     * @param string $regularMultiselect
     * @return SomethingInterface
     */
    public function setRegularMultiselect($regularMultiselect);

    /**
     * @return string
     */
    public function getRegularMultiselect();

    /**
     * @param float $someDecimal
     * @return SomethingInterface
     */
    public function setSomeDecimal($someDecimal);

    /**
     * @return float
     */
    public function getSomeDecimal();

    /**
     * @param int $someInteger
     * @return SomethingInterface
     */
    public function setSomeInteger($someInteger);

    /**
     * @return int
     */
    public function getSomeInteger();

    /**
     * @param int $color
     * @return SomethingInterface
     */
    public function setColor($color);

    /**
     * @return int
     */
    public function getColor();

    /**
     * @param string $colorMultiselect
     * @return SomethingInterface
     */
    public function setColorMultiselect($colorMultiselect);

    /**
     * @param bool $asArray
     * @return mixed
     */
    public function getColorMultiselect($asArray = false);

    /**
     * @param string $serializedField
     * @return SomethingInterface
     */
    public function setSerializedField($serializedField);

    /**
     * @param bool $asArray
     * @return mixed
     */
    public function getSerializedField($asArray = false);

    /**
     * @param string $createdAt
     * @return SomethingInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $updatedAt
     * @return SomethingInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param int[] $storeId
     * @return SomethingInterface
     */
    public function setStoreId($storeId);

    /**
     * @return int[]
     */
    public function getStoreId();
}
