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

namespace Umc\Sample\Source;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Option\ArrayInterface;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\Api\SomethingElseListRepositoryInterface;

class SomethingElse implements ArrayInterface
{
    /**
     * @var SomethingElseListRepositoryInterface
     */
    private $repository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var array
     */
    private $options;

    /**
     * SomethingElse constructor.
     * @param SomethingElseListRepositoryInterface $repository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        SomethingElseListRepositoryInterface $repository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function toOptionArray()
    {
        if ($this->options === null) {
            //add here filters sorting if needed
            $somethingElses = $this->repository->getList($this->searchCriteriaBuilder->create());
            $this->options = array_map(
                function (SomethingElseInterface $somethingElse) {
                    return [
                        'label' => $somethingElse->getName(),
                        'value' => $somethingElse->getSomethingElseId()
                    ];
                },
                $somethingElses->getItems()
            );
            uasort(
                $this->options,
                function (array $optionA, array $optionB) {
                    return strcmp($optionA['label'], $optionB['label']);
                }
            );
            $this->options = array_values($this->options);
        }
        return $this->options;
    }
}
