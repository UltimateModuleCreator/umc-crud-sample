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

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Umc\Sample\Api\Data\SomethingInterface;
use Umc\Sample\Api\SomethingRepositoryInterface;

class View implements ArgumentInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var SomethingRepositoryInterface
     */
    private $somethingRepository;
    /**
     * @var SomethingInterface|bool
     */
    private $something;

    /**
     * ViewSomething constructor.
     * @param RequestInterface $request
     * @param SomethingRepositoryInterface $somethingRepository
     */
    public function __construct(RequestInterface $request, SomethingRepositoryInterface $somethingRepository)
    {
        $this->request = $request;
        $this->somethingRepository = $somethingRepository;
    }

    /**
     * @return bool|SomethingInterface
     */
    public function getSomething()
    {
        if ($this->something === null) {
            $id = (int)$this->request->getParam('id');
            if ($id) {
                try {
                    $this->something = $this->somethingRepository->get($id);
                } catch (NoSuchEntityException $e) {
                    $this->something = false;
                }
            } else {
                $this->something = false;
            }
        }
        return $this->something;
    }
}
