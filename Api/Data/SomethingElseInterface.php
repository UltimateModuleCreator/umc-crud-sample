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
interface SomethingElseInterface
{
    /**
     * attribute constants
     */
    public const SOMETHING_ELSE_ID = 'something_else_id';
    public const NAME = 'name';
    public const IS_ACTIVE = 'is_active';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    /**
     * @param int $somethingId
     * @return SomethingElseInterface
     */
    public function setId($somethingId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $somethingElseId
     * @return SomethingElseInterface
     */
    public function setSomethingElseId($somethingElseId);

    /**
     * @return int
     */
    public function getSomethingElseId();

    /**
     * @param string $title
     * @return SomethingElseInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param bool $isActive
     * @return SomethingElseInterface
     */
    public function setIsActive($isActive);

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @param $createdAt
     * @return SomethingElseInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param $updatedAt
     * @return SomethingElseInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * @return string
     */
    public function getUpdatedAt();
}
