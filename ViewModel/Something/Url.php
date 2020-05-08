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

namespace Umc\Sample\ViewModel\Something;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Umc\Sample\Api\Data\SomethingInterface;

class Url implements ArgumentInterface
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return string
     */
    public function getListUrl()
    {
        return $this->urlBuilder->getUrl('sample/something/index');
    }

    /**
     * @param SomethingInterface $something
     * @return string
     */
    public function getSomethingUrl(SomethingInterface $something)
    {
        return $this->getSomethingUrlById((int)$something->getId());
    }

    /**
     * @param int $id
     * @return string
     */
    public function getSomethingUrlById(int $id)
    {
        return $this->urlBuilder->getUrl('sample/something/view', ['id' => $id]);
    }
}
