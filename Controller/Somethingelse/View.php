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

namespace Umc\Sample\Controller\Somethingelse;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\View\Result\Page;
use Magento\Store\Model\ScopeInterface;
use Magento\Theme\Block\Html\Breadcrumbs;
use Umc\Sample\Api\SomethingElseRepositoryInterface;
use Umc\Sample\ViewModel\SomethingElse\Url;

class View extends Action
{
    /**
     * @var string
     */
    public const BREADCRUMBS_CONFIG_PATH = 'sample/something_else/breadcrumbs';
    /**
     * @var SomethingElseRepositoryInterface
     */
    private $somethingElseRepository;
    /**
     * @var Url
     */
    private $urlModel;
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param Context $context
     * @param SomethingElseRepositoryInterface $somethingElseRepository
     * @param Url $urlModel
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        SomethingElseRepositoryInterface $somethingElseRepository,
        Url $urlModel,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->somethingElseRepository = $somethingElseRepository;
        $this->urlModel = $urlModel;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * @return Forward|Page
     */
    public function execute()
    {
        try {
            $somethingElseId = (int)$this->getRequest()->getParam('id');
            $somethingElse = $this->somethingElseRepository->get($somethingElseId);

            if (!$somethingElse->getIsActive()) {
                return $this->getNoRouteResult();
            }
        } catch (\Exception $e) {
            return $this->getNoRouteResult();
        }

        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $somethingElse->getName();
        $resultPage->getConfig()->getTitle()->set($title);
        $pageMainTitle = $resultPage->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle && $pageMainTitle instanceof \Magento\Theme\Block\Html\Title) {
            $pageMainTitle->setPageTitle($somethingElse->getName());
        }
        if ($this->scopeConfig->isSetFlag(self::BREADCRUMBS_CONFIG_PATH, ScopeInterface::SCOPE_STORE)) {
            /** @var Breadcrumbs $breadcrumbsBlock */
            $breadcrumbsBlock = $resultPage->getLayout()->getBlock('breadcrumbs');
            if ($breadcrumbsBlock) {
                $breadcrumbsBlock->addCrumb(
                    'home',
                    [
                        'label' => __('Home'),
                        'link'  => $this->_url->getUrl('')
                    ]
                );
                $breadcrumbsBlock->addCrumb(
                    'something_elses',
                    [
                        'label' => __('Something Else'),
                        'link'  => $this->urlModel->getListUrl()
                    ]
                );
                $breadcrumbsBlock->addCrumb(
                    'somethingElse-' . $somethingElse->getId(),
                    [
                        'label' => $somethingElse->getName()
                    ]
                );
            }
        }
        return $resultPage;
    }

    /**
     * @return Forward
     */
    private function getNoRouteResult()
    {
        /** @var Forward $resultForward */
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        $resultForward->forward('noroute');
        return $resultForward;
    }
}
