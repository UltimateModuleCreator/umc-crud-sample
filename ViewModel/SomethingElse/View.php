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

namespace Umc\Sample\ViewModel\SomethingElse;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Umc\Sample\Api\Data\SomethingElseInterface;
use Umc\Sample\Api\SomethingElseRepositoryInterface;

class View implements ArgumentInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var SomethingElseRepositoryInterface
     */
    private $somethingElseRepository;
    /**
     * @var SomethingElseInterface|bool
     */
    private $somethingElse;

    /**
     * ViewSomethingElse constructor.
     * @param RequestInterface $request
     * @param SomethingElseRepositoryInterface $somethingElseRepository
     */
    public function __construct(RequestInterface $request, SomethingElseRepositoryInterface $somethingElseRepository)
    {
        $this->request = $request;
        $this->somethingElseRepository = $somethingElseRepository;
    }

    /**
     * @return bool|SomethingElseInterface
     */
    public function getSomethingElse()
    {
        if ($this->somethingElse === null) {
            $id = (int)$this->request->getParam('id');
            if ($id) {
                try {
                    $this->somethingElse = $this->somethingElseRepository->get($id);
                } catch (NoSuchEntityException $e) {
                    $this->somethingElse = false;
                }
            } else {
                $this->somethingElse = false;
            }
        }
        return $this->somethingElse;
    }
}
