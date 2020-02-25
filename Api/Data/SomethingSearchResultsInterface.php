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

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface SomethingSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Umc\Sample\Api\Data\SomethingInterface[]
     */
    public function getItems();

    /**
     * @param \Umc\Sample\Api\Data\SomethingInterface[[] $items
     * @return $this
     */
    public function setItems(array $items);
}
