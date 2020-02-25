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

namespace Umc\Sample\Api;

use Umc\Sample\Api\Data\SomethingInterface;

interface SomethingRepositoryInterface
{
    /**
     * Save something.
     *
     * @param SomethingInterface $something
     * @return SomethingInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SomethingInterface $something);

    /**
     * Retrieve something.
     *
     * @param int $somethingId
     * @return SomethingInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $somethingId);

    /**
     * Delete something.
     *
     * @param SomethingInterface $something
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SomethingInterface $something);

    /**
     * Delete something by ID.
     *
     * @param int $somethingId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $somethingId);
}
