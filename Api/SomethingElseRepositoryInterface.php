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

use Umc\Sample\Api\Data\SomethingElseInterface;

interface SomethingElseRepositoryInterface
{
    /**
     * Save something else
     *
     * @param SomethingElseInterface $somethingElse
     * @return SomethingElseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SomethingElseInterface $somethingElse);

    /**
     * Retrieve something.
     *
     * @param int $somethingElseId
     * @return SomethingElseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $somethingElseId);

    /**
     * Delete something.
     *
     * @param SomethingElseInterface $somethingElse
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SomethingElseInterface $somethingElse);

    /**
     * Delete something by ID.
     *
     * @param int $somethingElseId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $somethingElseId);
}
