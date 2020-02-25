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

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Umc\Sample\Api\Data\SomethingElseInterface;

class SomethingElse extends AbstractModel implements SomethingElseInterface, IdentityInterface
{
    /**
     * Cache tag
     *
     * @var string
     */
    public const CACHE_TAG = 'sample_something_else';
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
    protected $_eventPrefix = 'sample_something_else';
    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'something_else';
    /**
     * @var string
     */
    protected $_idFieldName = 'something_else_id';
    //phpcs: enable

    /**
     * @param int $somethingElseId
     * @return SomethingElseInterface|SomethingElse
     */
    public function setSomethingElseId($somethingElseId)
    {
        return $this->setData(self::SOMETHING_ELSE_ID, $somethingElseId);
    }

    /**
     * @return int
     */
    public function getSomethingElseId()
    {
        return $this->getData(self::SOMETHING_ELSE_ID);
    }

    /**
     * @param $name
     * @return SomethingElseInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param bool $isActive
     * @return SomethingElseInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @param $createdAt
     * @return SomethingElseInterface|SomethingElse
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param $updatedAt
     * @return SomethingElseInterface|SomethingElse
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getSomethingElseId()];
    }
}
